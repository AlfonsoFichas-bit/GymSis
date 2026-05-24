# 📋 Información para el Desarrollo del Sprint 1

---

## **📌 Requerimientos Funcionales (RF) para el Sprint 1**
- **RF01**: El sistema debe registrar los datos personales y perfiles de clientes, empleados y administradores.
- **RF02**: El sistema debe permitir a los usuarios registrados iniciar sesión con sus credenciales, así como cerrar su sesión de forma segura.
- **RF03**: El sistema debe actualizar, inactivar y consultar los datos de los usuarios.
- **RF04**: El sistema debe asignar roles y permisos según el nivel de usuario.

---

## **📌 Requerimientos No Funcionales (RNF) Aplicables**
- **RNF01**: Interfaz amigable, clara y de fácil uso para todos los actores.
- **RNF02**: Tiempo de respuesta ≤ 5 segundos en operaciones principales.
- **RNF03**: Restringir acceso a funcionalidades según el rol del usuario.
- **RNF04**: Garantizar integridad y consistencia de la información almacenada.
- **RNF05**: Realizar respaldos periódicos de la base de datos.
- **RNF06**: Mantener disponibilidad durante el horario de atención del gimnasio.
- **RNF08**: Compatibilidad con dispositivos de escritorio y móviles (interfaz web responsiva).
- **RNF11**: Preservar la seguridad de los datos personales y administrativos.

---

## **📌 Historias de Usuario (HU) del Sprint 1**

### **🔹 HU-01: Registro base y validación de usuarios**
- **Usuario**: Administrador / Recepcionista.
- **Descripción**: Registrar nuevos usuarios (clientes, empleados, administradores) con datos personales y tipo de perfil para centralizar la base de datos.
- **Prioridad**: Alta.
- **Story Points**: 8.
- **Estimación**: 4 días.

#### **Criterios de Aceptación**:
1. El sistema permite registrar usuarios capturando **datos personales obligatorios** y tipo (cliente, empleado, administrador).
2. El sistema **valida que no existan duplicados por número de CI** antes de guardar.
3. El sistema **emite un mensaje de éxito** al guardar el registro.

---

### **🔹 HU-02: Iniciar y Cerrar Sesión (Autenticación)**
- **Usuario**: Todos (Administrador, Recepcionista, Cliente, Entrenador).
- **Descripción**: Iniciar sesión con credenciales y cerrar sesión para acceder a funciones y proteger la cuenta.
- **Prioridad**: Alta.
- **Story Points**: 3.
- **Estimación**: 2 días.

#### **Criterios de Aceptación**:
1. El sistema **valida usuario y contraseña** al iniciar sesión.
2. Muestra un botón/enlace visible de **"Cerrar Sesión"** en la interfaz tras autenticarse.
3. Al cerrar sesión, el sistema **destruye el token/sesión activa** inmediatamente.
4. Redirige al usuario a la pantalla pública de **Login** tras cerrar sesión.
5. Si el usuario intenta acceder a una URL interna después de cerrar sesión, el sistema **bloquea el acceso** y pide credenciales nuevamente.

---
### **🔹 HU-03: Gestión de Roles y Permisos de usuarios**
- **Usuario**: Administrador.
- **Descripción**: Asignar y modificar roles a los usuarios para garantizar acceso solo a funcionalidades autorizadas.
- **Prioridad**: Alta.
- **Story Points**: 8.
- **Estimación**: 5 días.

#### **Criterios de Aceptación**:
1. Cada usuario creado tiene un **rol asignado por defecto** (ej. Cliente).
2. El administrador puede **visualizar y modificar el rol** de un usuario desde un panel de control.
3. El sistema **bloquea el acceso** a módulos específicos si el usuario no tiene el rol correspondiente.
4. Cada cambio de rol queda **registrado con fecha y responsable**.

---
### **🔹 HU-04: Edición e Inactivación de usuarios**
- **Usuario**: Administrador / Recepcionista.
- **Descripción**: Editar información personal o inactivar un usuario para mantener datos actualizados sin perder historial.
- **Prioridad**: Media.
- **Story Points**: 5.
- **Estimación**: 3 días.

#### **Criterios de Aceptación**:
1. Los datos personales de cualquier usuario pueden **editarse sin alterar su historial** (reservas, pagos, etc.).
2. Un usuario puede ser marcado como **"inactivo"** (borrado lógico).
3. Al inactivar un usuario, su **acceso al sistema se bloquea** inmediatamente, pero sus registros previos se preservan en la base de datos.

---
---
## **📊 Resumen del Sprint 1**
   **ID**  | **Descripción**                          | **Prioridad** | **Story Points** | **Estimación** |
 |---------|-----------------------------------------|--------------|------------------|---------------|
 | HU-01   | Registro base y validación de usuarios   | Alta         | 8                | 4 días         |
 | HU-02   | Iniciar y Cerrar Sesión (Autenticación)  | Alta         | 3                | 2 días         |
 | HU-03   | Gestión de Roles y Permisos de usuarios  | Alta         | 8                | 5 días         |
 | HU-04   | Edición e Inactivación de usuarios      | Media        | 5                | 3 días         |

**Total Story Points**: **24**
**Tiempo estimado total**: **14 días**
