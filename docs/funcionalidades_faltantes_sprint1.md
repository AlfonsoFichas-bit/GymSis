# Funcionalidades Faltantes - Sprint 1

Tras el análisis comparativo entre el estado actual del sistema (Laravel + Filament) y el documento de requisitos `newSprint1.md`, se han identificado las siguientes funcionalidades y requerimientos pendientes:

## 1. Gestión de Usuarios (HU-01, HU-02, HU-03)
- **Tipo de Usuario "Entrenador":** La historia de usuario HU-02 menciona al "Entrenador" como un actor del sistema, pero esta opción no existe actualmente en el selector de tipo de usuario ni en la lógica de roles configurada.
- **Asignación de Rol por Defecto:** Según la HU-03 (Criterio 1), cada usuario debe tener un rol asignado por defecto (ej. Cliente). Actualmente, el sistema solo asigna roles si se selecciona explícitamente un "tipo", pero no existe una lógica de respaldo (fallback) que garantice el rol de "Cliente" si el campo llega vacío o no es procesado.

## 2. Requerimientos No Funcionales (RNF)
- **RNF02: Verificación de Rendimiento:** No se han implementado pruebas automatizadas o mecanismos de monitoreo para garantizar que el tiempo de respuesta sea ≤ 5 segundos en las operaciones principales.
- **RNF05: Sistema de Respaldos:** Falta la implementación de una tarea programada o herramienta para realizar respaldos periódicos de la base de datos de manera automatizada.
- **RNF06: Disponibilidad del Sistema:** No se ha definido ni implementado la lógica o infraestructura que asegure la disponibilidad constante del sistema específicamente durante el horario de atención del gimnasio.

## 3. Seguridad y Autenticación (HU-02)
- **Validación de Sesión Post-Logout:** Aunque el logout de Filament es funcional, falta la creación de pruebas de integración específicas que verifiquen técnicamente que, tras destruir el token/sesión, cualquier intento de acceso a URLs internas sea bloqueado y redirigido al login (Criterio 5 de la HU-02).
