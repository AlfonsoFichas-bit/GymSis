## Why

El gimnasio necesita un sistema de gestión centralizado para administrar usuarios (clientes, empleados, administradores) y sucursales. Actualmente no existe una plataforma digital que permita registrar, actualizar y controlar el acceso de los actores del sistema, ni centralizar la información operativa de las sedes. Esta iteración sienta las bases del sistema con los dos módulos críticos: gestión de usuarios y gestión de sucursales.

## What Changes

- **Módulo de Gestión de Usuarios**: CRUD completo de usuarios del sistema con roles (cliente, empleado, administrador), control de acceso basado en roles, soft delete/inactivación con preservación de historial, validación de CI único, y trazabilidad de cambios.
- **Módulo de Gestión de Sucursales**: CRUD completo de sucursales con código único, dirección, horario, capacidad máxima, visualización de disponibilidad en tiempo real, y trazabilidad de cambios.
- Sistema de autenticación con usuario/contraseña y restricción por rol (admin, recepcionista).
- Interfaz web responsiva (escritorio + móvil) usando Filament.

## Capabilities

### New Capabilities
- `user-management`: CRUD de usuarios del sistema con roles (cliente, empleado, administrador), validación de CI único, inactivación con preservación de datos, asignación y modificación de roles, y trazabilidad de cambios de estado.
- `branch-management`: CRUD de sucursales con código único, dirección, horario, capacidad máxima, visualización de disponibilidad en tiempo real de servicios y recursos, y trazabilidad de modificaciones.
- `role-access-control`: Autenticación mediante usuario/contraseña, asignación de roles por usuario, y restricción de acceso a funcionalidades según el rol del usuario (admin, recepcionista, cliente).

### Modified Capabilities

None (no existing specs).

## Impact

- **Modelos nuevos**: User (extender), Branch, BranchService, BranchResource, AuditLog (trazabilidad), Role/Permission
- **Migraciones nuevas**: tabla branches, branch_services, branch_resources, audit_logs, roles/permisos (Spatie o custom)
- **Filament Resources**: UserResource, BranchResource con panels de administración
- **Autenticación**: Integración con Filament Shield o sistema de roles nativo
- **Dependencias potenciales**: spatie/laravel-permission, spatie/laravel-activitylog
- **Frontend**: Paneles Filament con tema responsivo (Tailwind CSS v4)
- **Base de datos**: SQLite (existente)
