# Informe de Pruebas - Proyecto GymSis

Este documento detalla los resultados de las pruebas realizadas al sistema GymSis al finalizar el Sprint 1, con un enfoque riguroso en el cumplimiento de los **Criterios de Aceptación (AC)** definidos para cada Historia de Usuario (HU).

---

## 1. Validación de Criterios de Aceptación (Mapping)

A continuación se presenta la matriz de cumplimiento que vincula los requerimientos del Sprint 1 con las pruebas ejecutadas.

### **HU-01: Registro base y validación de usuarios**
| Criterio de Aceptación (AC) | Método de Verificación | Resultado |
| :--- | :--- | :---: |
| 1. Captura datos obligatorios y tipo. | `CreateUserTest` & `UserForm` validation. | ✅ Cumple |
| 2. Valida duplicados por CI. | `UserTest` (it requires a unique CI). | ✅ Cumple |
| 3. Emite mensaje de éxito. | `CreateUserTest` (assertRedirect & Flash message). | ✅ Cumple |

### **HU-02: Iniciar y Cerrar Sesión (Autenticación)**
| Criterio de Aceptación (AC) | Método de Verificación | Resultado |
| :--- | :--- | :---: |
| 1. Valida usuario y contraseña. | `AuthTest` (it allows active users to log in). | ✅ Cumple |
| 2. Botón visible de "Cerrar Sesión". | `LogoutButtonTest` (it shows logout button). | ✅ Cumple |
| 3. Destrucción de sesión inmediata. | `LogoutBlockTest` (it blocks access post-logout). | ✅ Cumple |
| 4. Redirección a Login tras logout. | `LogoutBlockTest` (assertRedirect to login). | ✅ Cumple |
| 5. Bloqueo de acceso sin sesión. | `LogoutBlockTest` (Middleware verification). | ✅ Cumple |

### **HU-03: Gestión de Roles y Permisos de usuarios**
| Criterio de Aceptación (AC) | Método de Verificación | Resultado |
| :--- | :--- | :---: |
| 1. Rol por defecto (Cliente). | `UserTest` (it assigns default cliente role). | ✅ Cumple |
| 2. Admin puede modificar roles. | `RoleModificationTest` (it admin can view edit page). | ✅ Cumple |
| 3. Bloqueo de módulos por rol. | `RoleAccessBlockTest` (it cliente receives forbidden). | ✅ Cumple |
| 4. Registro de cambios (Auditoría). | `RoleChangeAuditTest` (it logs type changes). | ✅ Cumple |

### **HU-04: Edición e Inactivación de usuarios**
| Criterio de Aceptación (AC) | Método de Verificación | Resultado |
| :--- | :--- | :---: |
| 1. Edición sin alterar historial. | `UserEditHistoryTest` (it editing name preserves log). | ✅ Cumple |
| 2. Marcado como "inactivo". | `InactivationPreserveTest` (it user record remains). | ✅ Cumple |
| 3. Bloqueo de acceso tras inactivar. | `InactiveUserAccessTest` & `InactivationPreserveTest`. | ✅ Cumple |

---

## 2. Pruebas de Característica (Automated Feature Tests)

Se ejecutó la suite completa de tests mediante **Pest PHP** con los siguientes resultados:

*   **Total de Tests:** 24
*   **Aprobados:** 24
*   **Tiempo de Ejecución:** 7.28s
*   **Cobertura Crítica:** 100% de los criterios de aceptación del Sprint 1.

---

## 3. Pruebas de Caja Negra (Black Box)

Estas pruebas simulan el comportamiento del usuario final para validar los Criterios de Aceptación desde la UI/UX.

| ID | Escenario (HU vinculada) | Entrada | Resultado Esperado | Estado |
| :--- | :--- | :--- | :--- | :---: |
| **CN-01** | Registro Inválido (HU-01) | CI: 12345 (Ya existe) | El sistema muestra mensaje "CI ya registrado" y no guarda. | ✅ Pasó |
| **CN-02** | Seguridad Post-Logout (HU-02) | Atrás en navegador | El sistema redirige al login por sesión expirada. | ✅ Pasó |
| **CN-03** | Privilegios de Cliente (HU-03) | Login como Cliente | No aparece el menú "Gestión de Usuarios". | ✅ Pasó |
| **CN-04** | Límite de Edad (HU-01) | Fecha: 2020-01-01 | Error: "Debes ser mayor de 18 años". | ✅ Pasó |
| **CN-05** | Persistencia de Inactivo (HU-04) | Inactivar Usuario X | Usuario X no puede entrar, pero el Admin ve su historial. | ✅ Pasó |

---

## 4. Dictamen Final del Metodólogo

Tras analizar los resultados y la trazabilidad con el documento `newSprint1.md`, se dictamina que el incremento de software es **APTO** para su entrega. Se ha demostrado que cada funcionalidad no solo existe, sino que se comporta según las reglas de negocio establecidas en los criterios de valoración.
