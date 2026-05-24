## Context

El sistema tiene implementado el comando `backup:database` y la lógica de asignación de roles en un `UserObserver`. Sin embargo, la tarea de respaldo diario no está cargada por Laravel debido a una ruta de archivo incorrecta. Adicionalmente, el bloqueo de sesión de usuarios inactivos no es inmediato para sesiones activas, y los cambios de roles hechos directamente sobre la relación de Spatie no registran logs de auditoría adecuados.

## Goals / Non-Goals

**Goals:**
- Automatizar la ejecución diaria del comando de respaldo de base de datos a las 02:00 AM mediante la configuración en `routes/console.php`.
- Bloquear de manera inmediata el acceso al panel administrativo para cualquier usuario cuya cuenta sea marcada como inactiva (`status = false`), interrumpiendo cualquier sesión abierta.
- Asegurar que todos los cambios de roles queden registrados en el historial de auditoría con fecha y responsable, y prevenir inconsistencias entre el campo `type` y la relación `roles`.

**Non-Goals:**
- Implementar un sistema de logging de relaciones complejas (pivot logs) para Spatie. En su lugar, se opta por simplificar la UI y basar la asignación de roles exclusivamente en el campo `type` del usuario.

## Decisions

### 1. Registro de Tarea Programada en routes/console.php
- **Alternativa A**: Registrar en `app/Console/Kernel.php` (Laravel tradicional).
- **Alternativa B**: Registrar en `routes/console.php` usando la fachada `Schedule` (Laravel 11+).
- **Decisión**: Se elige la **Alternativa B**. Dado que este proyecto utiliza la estructura moderna de Laravel con autodiscovery y configuración a través de `bootstrap/app.php` cargando `routes/console.php` como archivo de comandos y tareas, es la ubicación estándar recomendada para mantener el código limpio y libre de clases Kernel obsoletas.

### 2. Bloqueo de Acceso mediante canAccessPanel() en el Modelo User
- **Alternativa A**: Crear un Middleware personalizado global que verifique el estado del usuario en cada petición.
- **Alternativa B**: Modificar el método `canAccessPanel()` del modelo `User` (el cual implementa `FilamentUser`).
- **Decisión**: Se elige la **Alternativa B**. Filament ejecuta el método `canAccessPanel()` del modelo autenticado antes de permitir el acceso al panel en cada petición. Si este retorna `false`, Filament deniega el acceso automáticamente de forma nativa. Esto es eficiente, inmediato y no requiere registrar middlewares adicionales en el framework.

### 3. Simplificación de la UI y Sincronización Unidireccional de Roles
- **Alternativa A**: Mantener ambos selectores (`type` y `roles`) y programar un logger de tablas pivote (relaciones BelongsToMany) para Spatie.
- **Alternativa B**: Ocultar/Remover el selector de `roles` directo en `UserForm` y basar toda asignación de rol en el campo `type`.
- **Decisión**: Se elige la **Alternativa B**. Dado que los roles de la aplicación son 1:1 con el tipo de usuario (admin, recepcionista, cliente, entrenador, empleado) y se sincronizan a través de `UserObserver`, el selector directo de `roles` es redundante y peligroso (provoca desincronización). Al removerlo, el administrador cambia el rol modificando únicamente el campo `type`. Spatie Activitylog registra automáticamente los cambios del campo `type` (incluyendo responsable y fecha), garantizando la auditoría sin requerir complejidad extra para auditar tablas pivote.

## Risks / Trade-offs

- **[Riesgo]**: Un usuario podría requerir múltiples roles simultáneos en el futuro.
  - **Mitigación**: La lógica de negocio actual del gimnasio establece que cada usuario tiene un perfil operativo único (Cliente, Administrador, etc.). Si en un futuro se requiere una estructura multi-rol más compleja, se podrá reintroducir el selector y configurar hooks específicos para auditar la relación pivote.
