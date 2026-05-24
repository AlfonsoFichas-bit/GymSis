## Why

El sistema actual (Laravel + Filament) implementó la gestión de usuarios con roles, autenticación y sucursales, pero un análisis contra los requisitos del Sprint 1 reveló funcionalidades pendientes: falta el tipo de usuario "Entrenador" como actor del sistema, no existe una asignación de rol por defecto (fallback a "Cliente"), no se han implementado verificaciones de rendimiento (RNF02), respaldos automáticos (RNF05), ni pruebas de integración que verifiquen el bloqueo de acceso post-logout. Estas brechas deben cerrarse para cumplir completamente con el Sprint 1.

## What Changes

- **Agregar tipo "Entrenador"**: Añadir `entrenador` como opción en el selector de tipo de usuario y crear el rol correspondiente con permisos específicos (ver disponibilidad de sucursales, ver perfil propio).
- **Asignación de rol por defecto**: Implementar lógica de respaldo (fallback) que asigne automáticamente el rol "Cliente" cuando no se procese explícitamente un tipo de usuario.
- **Verificación de Rendimiento (RNF02)**: Crear pruebas automatizadas que verifiquen que las operaciones principales respondan en ≤ 5 segundos.
- **Sistema de Respaldos (RNF05)**: Implementar una tarea programada (schedule) para respaldos periódicos de la base de datos SQLite.
- **Disponibilidad del Sistema (RNF06)**: Agregar lógica de monitoreo básico para verificar disponibilidad durante horario de atención.
- **Pruebas de Bloqueo Post-Logout (HU-02 C5)**: Crear tests de integración que verifiquen que después de cerrar sesión, el acceso a URLs internas sea bloqueado y redirigido al login.

## Capabilities

### New Capabilities
- `entrenador-role`: Agregar el rol "Entrenador" con sus permisos y tipo de usuario correspondiente, permitiendo que este actor acceda al sistema con las funcionalidades adecuadas.
- `default-role-assignment`: Lógica de asignación automática de rol por defecto ("Cliente") al crear usuarios sin tipo explícito, garantizando que ningún usuario quede sin rol.
- `performance-verification`: Pruebas automatizadas de rendimiento para validar que las operaciones principales (CRUD de usuarios, sucursales) respondan en ≤ 5 segundos.
- `database-backup`: Tarea programada para realizar respaldos periódicos automáticos de la base de datos, asegurando la integridad de la información.
- `post-logout-access-block`: Pruebas de integración que verifican el bloqueo de acceso a rutas internas después del cierre de sesión.

### Modified Capabilities
- `user-management`: Agregar tipo de usuario "Entrenador" al formulario de registro y actualización de usuarios.
- `role-access-control`: Agregar el rol "Entrenador" con permisos de visualización de sucursales y perfil propio; implementar asignación por defecto del rol "Cliente".

## Impact

- **Modelo**: Agregar tipo `entrenador` en el enum/cast de `type` en User model
- **Migraciones**: Ninguna nueva; solo datos semilla (seed) para el nuevo rol
- **Seeders**: Actualizar RoleSeeder para crear rol "entrenador" con permisos `ViewAny:Branch`, `View:Branch`, `view_availability:Branch`
- **Filament Resources**: Actualizar UserForm para incluir `entrenador` en el select de tipo de usuario
- **Pruebas**: Crear tests para rendimiento (≤5s), bloqueo post-logout, y asignación por defecto de roles
- **Task Scheduling**: Agregar comando Artisan para respaldo de BD y registrarlo en `Kernel::schedule()`
- **Dependencias**: Ninguna nueva
