# Informe de Pruebas - Proyecto GymSis

Este documento detalla los resultados de las pruebas realizadas al sistema GymSis al finalizar el Sprint 1, abarcando tanto pruebas automatizadas (Unitarias y de Integración) como pruebas de Caja Negra.

---

## 1. Resumen de Pruebas Automatizadas

Las pruebas automatizadas fueron ejecutadas utilizando **Pest PHP**. El enfoque principal fue validar la lógica de negocio, la seguridad de las rutas y la integridad de los datos.

### 1.1. Resultados Generales
| Categoría | Total de Tests | Aprobados | Fallidos | Éxito % |
| :--- | :---: | :---: | :---: | :---: |
| Unitarias | 1 | 1 | 0 | 100% |
| Característica (Feature) | 23 | 23 | 0 | 100% |
| **Total** | **24** | **24** | **0** | **100%** |

### 1.2. Detalle de Pruebas de Característica
*   **Autenticación y Sesión:**
    *   `LogoutButtonTest`: Verifica la visibilidad del botón "Salir" y su ausencia en la pantalla de login.
    *   `LogoutBlockTest`: Asegura que tras el cierre de sesión, las rutas protegidas (usuarios, sucursales) sean inaccesibles.
    *   `InactiveUserAccessTest`: Valida que usuarios con `status = false` no puedan acceder al panel.
*   **Gestión de Usuarios (CRUD & Lógica):**
    *   `UserTest`: Valida la unicidad del CI y la asignación automática del rol 'cliente'.
    *   `CreateUserTest`: Verifica el flujo de creación y redirección.
    *   `UserEditHistoryTest`: Asegura que la edición de nombres no rompa el historial de actividad.
    *   `InactivationPreserveTest`: Confirma que la inactivación es un borrado lógico (el registro permanece en DB).
*   **Seguridad y Auditoría:**
    *   `RoleAccessBlockTest`: Valida que roles sin permisos (ej. cliente) reciban '403 Forbidden' en áreas administrativas.
    *   `RoleModificationTest`: Verifica que solo administradores vean y editen roles.
    *   `RoleChangeAuditTest`: Comprueba el registro de auditoría ante cambios de tipo de usuario.
*   **Infraestructura:**
    *   `BackupDatabaseTest`: Verifica el comando personalizado de respaldo de la base de datos SQLite.
    *   `PerformanceTest`: Asegura que las páginas principales carguen en menos de 3 segundos.

---

## 2. Pruebas de Caja Negra (Black Box Testing)

Las pruebas de caja negra se centraron en validar las funcionalidades desde la perspectiva del usuario final, basándose exclusivamente en los requerimientos y criterios de aceptación.

### 2.1. Escenarios de Prueba

| ID | Escenario de Prueba | Entrada (Input) | Resultado Esperado | Estado |
| :--- | :--- | :--- | :--- | :---: |
| **CP-01** | Registro con CI duplicado | Usuario con CI ya existente. | Mensaje de error indicando que el CI ya está registrado. | ✅ Pasó |
| **CP-02** | Login con credenciales inválidas | Email correcto, contraseña errónea. | Error de validación en el formulario de login. | ✅ Pasó |
| **CP-03** | Acceso directo a URL protegida | Intento de entrar a `/admin/users` sin sesión. | Redirección inmediata a `/admin/login`. | ✅ Pasó |
| **CP-04** | Registro de menor de edad | Fecha de nacimiento que resulte en < 18 años. | Error: "Debes ser mayor de 18 años para registrarte". | ✅ Pasó |
| **CP-05** | Inactivación de usuario | Toggle de "Estado" en 'Off' para un usuario. | El usuario ya no puede loguearse, pero aparece en la lista administrativa. | ✅ Pasó |

---

## 3. Conclusiones del Analista

1.  **Estabilidad:** El sistema muestra una alta estabilidad en sus funciones core. No se detectaron regresiones tras las integraciones de auditoría y roles.
2.  **Seguridad:** El middleware de Filament y la integración con Spatie Permission funcionan correctamente, bloqueando accesos no autorizados tanto a nivel de UI como de URL.
3.  **Rendimiento:** Las pruebas de estrés básico confirman tiempos de respuesta óptimos ( < 500ms en promedio para renderizado), cumpliendo con el RNF02.
4.  **Recomendación:** Para el Sprint 2, se recomienda ampliar las pruebas de caja negra para incluir flujos complejos de servicios y pagos.
