## Why

Esta propuesta aborda las brechas y fallas identificadas en la verificación del Sprint 1 frente al documento de requerimientos newSprint1.md. Se corrigen la falta de programación del respaldo de la base de datos, el bloqueo incompleto de usuarios inactivos con sesiones ya iniciadas, y la falta de registro de cambios de rol e inconsistencias en la interfaz.

## What Changes

- **Programación de Respaldos**: Se registra formalmente el comando `backup:database` en `routes/console.php` para que se ejecute de manera diaria a las 02:00 AM, resolviendo la falta de automatización periódica de RNF05.
- **Bloqueo Inmediato de Sesión**: Se actualiza la comprobación del panel administrativo para rechazar accesos a usuarios con estado inactivo, cerrando sus sesiones activas de manera inmediata.
- **Sincronización y Auditoría de Roles**: Se remueve el campo selector directo de roles de Spatie en el formulario de creación/edición de usuarios de Filament. De este modo, la asignación de rol se realiza únicamente a través de la selección del campo `type` (que se sincroniza en el Observer y es plenamente auditado por Spatie Activitylog con autor y fecha).

## Capabilities

### New Capabilities
- `database-backup`: Requisito para contar con un respaldo diario automático y con marca de tiempo de la base de datos SQLite en storage/backups.

### Modified Capabilities
- `user-management`: Asegurar que el cambio de rol del usuario (a través del campo `type`) sea el único mecanismo expuesto y quede registrado con responsable y fecha.
- `role-access-control`: Restringir el acceso a paneles y forzar el bloqueo inmediato si un usuario es marcado como inactivo.

## Impact

- **Rutas y Tareas Programadas**: Modificación en `routes/console.php` para configurar la programación diaria.
- **Modelos**: Modificación en `app/Models/User.php` para validar el estado activo del usuario en `canAccessPanel()`.
- **Formularios de Filament**: Modificación en `app/Filament/Resources/Users/Schemas/UserForm.php` para eliminar o deshabilitar el selector de roles directo de Spatie y dejar el control exclusivo bajo el campo `type`.
