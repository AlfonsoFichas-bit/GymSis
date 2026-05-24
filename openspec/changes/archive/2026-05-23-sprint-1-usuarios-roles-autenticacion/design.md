## Context

Aplicación Laravel 13 con Filament 5 y SQLite. Actualmente existe un sistema de roles (admin, recepcionista, empleado, cliente) con Spatie Laravel Permission, trazabilidad con Activitylog, y Filament Resources para usuarios y sucursales con CRUD funcional. Se identificaron brechas contra el Sprint 1: falta el tipo "Entrenador", no hay asignación de rol por defecto, faltan respaldos automáticos, verificación de rendimiento, y pruebas de bloqueo post-logout.

## Goals / Non-Goals

**Goals:**
- Agregar "Entrenador" como tipo de usuario y rol con permisos (ver sucursales, ver perfil propio)
- Implementar asignación automática del rol "Cliente" como fallback al crear usuarios sin tipo explícito
- Crear comando Artisan para respaldo de BD SQLite y registrarlo en el scheduler
- Implementar pruebas de rendimiento (≤5s) para operaciones principales
- Agregar tests de integración que verifiquen bloqueo de acceso post-logout

**Non-Goals:**
- Infraestructura de alta disponibilidad o clustering (RNF06 se cubre con monitoreo básico)
- Respaldo a servicios cloud externos (solo respaldo local con timestamp)
- Cambios en la UI de Filament más allá de agregar la opción "Entrenador"
- Modificaciones a la lógica de sucursales o branch management

## Decisions

| Decisión | Opción Elegida | Alternativas | Razón |
|----------|---------------|--------------|-------|
| Rol Entrenador | Seed existente RoleSeeder + permiso `ViewAny:Branch`, `View:Branch`, `view_availability:Branch` | Nuevo seeder separado | Consistencia con roles actuales; se agrega al mismo seeder |
| Fallback rol por defecto | Evento `created` en User model o Observer que asigna rol "cliente" si no tiene roles | Middleware post-creación | Se ejecuta siempre al crear usuario, independientemente del contexto |
| Backup BD | Comando Artisan personalizado `backup:database` que copia `database/database.sqlite` con timestamp | spatie/laravel-backup | Evita dependencia externa; SQLite permite copia directa del archivo |
| Pruebas rendimiento | Pest test con medición manual (`startTime`/`endTime`) para operaciones CRUD | Paquete externo de benchmarking | Enfoque liviano; si se necesita más adelante se agrega blackfire.io |
| Pruebas post-logout | Test Livewire que visita ruta admin después de logout y verifica redirección a login | Test HTTP sin Livewire | Livewire permite simular el flujo completo de sesión |

## Risks / Trade-offs

- **[Rendimiento en SQLite]** Las pruebas de rendimiento pueden variar según el hardware. Mitigación: establecer umbral conservador de 3s para desarrollo local y 5s para CI.
- **[Backup en producción]** Copia directa de archivo SQLite puede corromperse si hay escrituras concurrentes. Mitigación: ejecutar backup solo cuando la aplicación está en estado idle (madrugada) y verificar integridad post-copia.
- **[Rol Entrenador existente]** Si ya hay usuarios con type no contemplado en el enum, pueden quedar sin rol. Mitigación: el fallback garantiza que siempre tengan al menos "cliente".
