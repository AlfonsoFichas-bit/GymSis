## Context

El sistema tiene 8 tests existentes en `tests/Feature/` que cubren parcialmente los criterios de aceptación del Sprint 1. Se identificaron 6 criterios sin test automatizado. Todos los tests existentes usan `pestphp/pest` con `RefreshDatabase`, `Livewire` testing y HTTP testing. No hay tests de browser (Dusk).

Los tests se ejecutan contra SQLite en memoria. El código de producción no necesita cambios.

## Goals / Non-Goals

**Goals:**
- Crear tests para los 6 criterios de aceptación sin cobertura actual
- Seguir el patrón existente: Pest + `uses(RefreshDatabase::class)` + Livewire/HTTP tests
- Usar `RoleSeeder` y `User::factory()` como ya se hace en los tests existentes
- Cada test es independiente y verifica un único criterio de aceptación

**Non-Goals:**
- No se modifican archivos de producción
- No se agregan nuevas dependencias
- No se crean tests de browser (Dusk) — no hay dependencia instalada
- No se modifica cobertura de tests existentes

## Decisions

| Decisión | Opciones | Elegido | Razón |
|----------|----------|---------|-------|
| Enfoque de testing | Dusk vs HTTP vs Livewire | **Livewire + HTTP** | Los tests existentes usan Livewire para formularios y HTTP para páginas. Dusk no está instalado. |
| Verificación de notificación toast | Buscar en HTML vs Livewire assertions | **Livewire mock** | Filament `CreateRecord` usa `$this->notification()` internamente; se puede verificar que `create()` no tiene errores y redirige. |
| Verificación botón logout | Livewire component vs HTTP HTML | **HTTP con assertSee** | Se puede hacer GET a página autenticada y verificar que el HTML contiene el botón/logout form. |
| Verificación preservación de historial | Activity Log vs BD directa | **Activity Log** | `spatie/laravel-activitylog` ya está instalado y se usa en `RoleChangeAuditTest`. |
| Verificación bloqueo por rol | Policy test vs HTTP access test | **HTTP access test** | El sistema usa `UserPolicy` con permisos Spatie. Se prueba que usuario sin permiso recibe 403. |

## Risks / Trade-offs

| Riesgo | Mitigación |
|--------|------------|
| Tests de renderizado pueden ser frágiles si cambia el HTML de Filament | Usar aserciones en contenido traducible (texto "Cerrar Sesión") en lugar de selectores CSS complejos |
| Livewire test para notificación toast puede ser indirecto | Verificar que `create()` ejecuta sin errores y que el `Notification::assertNotifiable()` envió notificación si es necesario |
| Dependencia de `RoleSeeder` para permisos | Ya es el patrón existente en todos los tests; se ejecuta `$this->seed(RoleSeeder::class)` al inicio de cada test |
