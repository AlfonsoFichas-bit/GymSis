## Why

Los criterios de aceptación del Sprint 1 están implementados en el sistema pero no todos tienen tests automatizados que los verifiquen explícitamente. Esto genera riesgo de regresiones y falta de trazabilidad entre los requisitos y las pruebas. Se necesita crear tests que validen cada criterio de aceptación de las 4 historias de usuario.

## What Changes

- Agregar tests faltantes para los criterios de aceptación de HU-01, HU-02, HU-03 y HU-04
- No se modifica lógica de negocio ni se alteran archivos de implementación existentes
- Solo se añaden nuevos archivos de test en `tests/Feature/`

## Capabilities

### New Capabilities
- `user-registration-success-notification`: Test que verifica mensaje de éxito al registrar usuario (HU-01 AC3)
- `logout-button-visibility`: Test que verifica que el botón "Cerrar Sesión" está visible tras autenticarse (HU-02 AC2)
- `role-modification-from-panel`: Test que verifica que admin puede visualizar y modificar roles desde el panel (HU-03 AC2)
- `role-based-access-block`: Test que verifica bloqueo de acceso a módulos según rol insuficiente (HU-03 AC3)
- `user-edit-preserves-history`: Test que verifica que editar datos de usuario no altera registros históricos (HU-04 AC1)
- `inactivation-preserves-records`: Test que verifica que al inactivar un usuario sus registros previos se preservan (HU-04 AC3)

### Modified Capabilities
- Ninguna. No cambian requisitos existentes, solo se añaden tests.

## Impact

- Archivos nuevos en `tests/Feature/` (6 tests nuevos aproximadamente)
- Dependencias existentes: `pestphp/pest`, `livewire/livewire` (ya instaladas)
- Sin impacto en código de producción, rutas, migraciones, ni configuración
