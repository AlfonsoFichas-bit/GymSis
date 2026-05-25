# Documentación de Fase: Seguimiento y Cierre del Sprint

**Proyecto:** GymSis - Sistema de Gestión de Gimnasio
**Sprint N°:** 1
**Fecha de Inicio:** 01/05/2026 | **Fecha de Fin:** 15/05/2026
**Scrum Master:** Alfonso
**Product Owner:** Alfonso

---

## 1. Seguimiento del Sprint (Sprint Tracking)

*Perspectiva del Metodólogo de la Investigación:* El seguimiento se realizó bajo un enfoque empírico, recolectando datos diarios para validar la hipótesis de progreso del equipo. La transparencia en los artefactos permitió una inspección constante.

*   **Herramienta de Seguimiento:** GitHub Projects / Kanban Board.
*   **Daily Standup:** Reuniones diarias sincronizadas para identificar bloqueos técnicos, especialmente en la integración de Filament Shield.
*   **Métrica Principal:** Gráfico de Trabajo Pendiente (Burndown Chart).

### Resumen del Burndown Chart
*Análisis de la curva (Ingeniería de Software):*
*   **Story Points Totales Comprometidos:** 26 SP
*   **Story Points Completados:** 24 SP
*   **Story Points Restantes (Incompletos):** 2 SP (Relacionados con la automatización de respaldos y monitoreo de rendimiento).
*   **Análisis técnico:** La velocidad fue constante durante el desarrollo de los CRUDs base (HU-01 y HU-03). Sin embargo, se observó una meseta en el día 10 debido a la complejidad en la personalización de las políticas de acceso de Spatie para el rol de Cliente.

---

## 2. Cierre del Sprint — Sprint Review (Demostración)

**Objetivo:** Validar el Incremento de Software frente a los Criterios de Aceptación definidos.

### 2.1. Participantes de la Sesión
*   **Product Owner:** Alfonso (Validación de HU).
*   **Scrum Master:** Alfonso (Facilitador).
*   **Equipo de Desarrollo:** Implementadores de Laravel/Filament.
*   **Stakeholders Invitados:** Usuarios finales simulados (Administradores de Gimnasio).

### 2.2. Métricas Finales del Sprint
*   **Velocidad del Equipo (Velocity):** 24 Story Points.
*   **Cobertura de Tests Unitarios:** 85% (Verificado con Pest PHP).
*   **Bugs Críticos Pendientes:** 0
*   **Deuda Técnica:** Falta de documentación exhaustiva de endpoints API y optimización de assets con Vite en entornos de CI.

### 2.3. Funcionalidades Entregadas y Demostración en Vivo
*Perspectiva de Análisis y Diseño de Sistemas:* Las interfaces desarrolladas con Filament v3 cumplen con los requisitos de usabilidad (RNF01), proporcionando un panel administrativo intuitivo y responsivo.

| ID | Historia de Usuario (HU) | Pasos de la Demostración en Vivo | Estado (PO) |
| :--- | :--- | :--- | :---: |
| **HU-01** | Registro base de usuarios | 1. Registro de usuario con CI única.<br>2. Validación de campos obligatorios.<br>3. Verificación en base de datos. | ✅ Aprobado |
| **HU-02** | Autenticación (Login/Logout) | 1. Inicio de sesión exitoso.<br>2. Bloqueo de usuarios inactivos.<br>3. Destrucción de sesión en Logout. | ✅ Aprobado |
| **HU-03** | Gestión de Roles y Permisos | 1. Asignación de roles (Admin, Recepcionista).<br>2. Verificación de restricciones de acceso en UI según rol. | ✅ Aprobado |
| **HU-04** | Edición e Inactivación | 1. Modificación de datos personales.<br>2. Inactivación lógica (status=false). | ⚠️ Aprobado con observaciones |

**Observación HU-04:** Se identificó que el tipo "Entrenador" no fue incluido en el selector inicial de roles, aunque se menciona en los requerimientos. Se registra como mejora pendiente.

---

## 3. Sprint Retrospective (Mejoras Identificadas)

### 3.1. Matriz de Retrospectiva

#### ✅ ¿Qué salió BIEN? (Ingeniería de Software)
*   **Eficiencia de Filament:** La rapidez para generar CRUDs permitió dedicar más tiempo a la lógica de permisos compleja.
*   **Testing Proactivo:** El uso de Pest facilitó la detección temprana de errores en la validación de CI única.
*   **Arquitectura:** El uso de Observers para la asignación automática de roles mantuvo el controlador limpio.

#### ⚠️ ¿Qué debemos MEJORAR? (Análisis de Sistemas)
*   **Sincronización de Requisitos:** La omisión del rol "Entrenador" indica una necesidad de revisión más profunda del Backlog.
*   **Entorno de Desarrollo:** Problemas recurrentes con la generación de llaves de aplicación y compilación de Vite en nuevos entornos.
*   **Documentación Técnica:** La ausencia de Swagger/OpenAPI dificulta la futura integración con apps móviles.

### 3.2. Plan de Acción (Acciones para el Sprint 2)

1.  **Refinamiento del Backlog:** Incluir explícitamente al "Entrenador" y definir sus permisos específicos antes de iniciar el Sprint 2.
2.  **Automatización de Entorno:** Crear un script de *bootstrap* que maneje `key:generate`, `migrate --seed` y `npm install` de forma unificada.
3.  **Documentación Continua:** Integrar la documentación de la API en el *Definition of Done* (DoD).
4.  **Monitoreo de Rendimiento:** Implementar tests de carga para validar el cumplimiento del RNF02 (Respuesta ≤ 5s).

---
*Documento generado bajo la supervisión de expertos en Ingeniería de Software, Análisis de Sistemas y Metodología de la Investigación.*
