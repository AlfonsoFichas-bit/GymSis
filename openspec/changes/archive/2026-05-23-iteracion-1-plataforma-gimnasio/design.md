## Context

Aplicación Laravel 13 con Filament 5 y SQLite. Actualmente solo existe el modelo User por defecto, sin migraciones adicionales, sin Filament Resources, y sin sistema de roles. Se requiere construir la base del sistema con gestión de usuarios (con roles) y gestión de sucursales.

## Goals / Non-Goals

**Goals:**
- Implementar modelo de datos para usuarios extendidos (CI, tipo, estado, roles) y sucursales (dirección, horario, capacidad, código único)
- Construir Filament Resources para administración de usuarios y sucursales
- Implementar autenticación con login/password y restricción por roles (admin, recepcionista, cliente)
- Registrar trazabilidad de operaciones críticas (creación, modificación, inactivación)
- Interfaz responsiva usando Filament + Tailwind CSS v4

**Non-Goals:**
- Módulo de membresías, pagos, clases, equipamiento (iteraciones futuras)
- API REST pública (solo interfaz web por ahora)
- Notificaciones en tiempo real (WebSockets)
- Integración con pasarelas de pago

## Decisions

| Decisión | Opción Elegida | Alternativas | Razón |
|----------|---------------|--------------|-------|
| Sistema de roles | Spatie Laravel Permissions | Rol custom en columna `type` | Spatie ya es estándar Laravel, permite escalar a permisos granulares en futuras iteraciones sin cambiar la arquitectura |
| Trazabilidad | Spatie Laravel Activitylog | Custom audit_logs table | Spatie es flexible, ya integra eventos Eloquent, y permite consultar actividad por modelo fácilmente |
| Extensión User | Migración adicional + columnas | Nueva tabla `user_profiles` | Evita joins innecesarios; los datos de autenticación y perfil están juntos para consultas simples |
| Filament Panel | 1 panel admin unificado | Múltiples paneles (admin, recepcionista) | Por ahora un solo panel con widgets/recursos; si hay necesidad se divide después |
| Disponibilidad sucursales | Cálculo en tiempo real vía relación `branch_services` y `branch_resources` | Cachés pre-calculadas | La consulta es simple (contar ocupados vs capacidad); se optimiza después si hay cuello de botella |
| CI único validación | Unique constraint + validación en Form Request | Validación solo en controlador | Doble capa: base de datos + Form Request para integridad garantizada |

## Risks / Trade-offs

- **[Dependencia externa] Spatie packages** → Ambas librerías son mantenidas activamente, con millones de instalaciones. Mitigación: versiones pin en composer.json.
- **[SQLite en producción] Capacidad concurrente** → SQLite es adecuado para desarrollo y equipos pequeños. Mitigación: diseño listo para migrar a MySQL/PostgreSQL sin cambios de modelo.
- **[Single Filament Panel] Crecimiento futuro** → Si se necesitan vistas diferenciadas por rol, se puede dividir en múltiples paneles sin refactor mayor.
- **[Trazabilidad en modelo] Performance** → Activitylog se almacena en JSON. Mitigación: índices en `subject_id` y `causer_id`; podarse periódicamente.
