# **Requerimientos para la Iteración 1 (Sprint 1)**

## **Historias de Usuario Asignadas**
---
### **HU-01: Gestión de usuarios del sistema**
- **Descripción**: Como administrador o recepcionista, quiero registrar nuevos usuarios, actualizar o inactivar sus datos y asignarles roles y permisos, para mantener la base de datos del gimnasio actualizada y garantizar que cada actor acceda únicamente a las funcionalidades de su perfil.
- **Prioridad**: Alta
- **Story Points**: 21
- **Estimación**: 12 días

#### **Criterios de Aceptación**
1. El sistema permite registrar usuarios con datos personales y tipo (cliente, empleado, administrador).
2. Se valida que no existan duplicados por número de CI.
3. Los datos de cualquier usuario pueden editarse sin alterar su historial.
4. Un usuario puede ser inactivado; su acceso se bloquea pero sus registros se preservan.
5. Cada usuario tiene un rol asignado que restringe el acceso a módulos no autorizados.
6. El administrador puede modificar el rol de un usuario en cualquier momento.
7. Cada cambio de estado queda registrado con fecha y responsable.

#### **Requerimientos Funcionales Relacionados**
- **RF01**: El sistema deberá permitir registrar clientes, empleados y administradores.
- **RF02**: El sistema deberá permitir actualizar, inactivar y consultar datos de los usuarios.
- **RF03**: El sistema deberá permitir asignar roles y permisos según el tipo de usuario.

---
### **HU-03: Registro, actualización y consulta de sucursales**
- **Descripción**: Como administrador, quiero registrar nuevas sucursales, modificar sus datos operativos y consultar en tiempo real la disponibilidad de sus servicios y recursos, para mantener el control centralizado de todas las sedes del gimnasio.
- **Prioridad**: Alta
- **Story Points**: 8
- **Estimación**: 5 días

#### **Criterios de Aceptación**
1. El sistema permite registrar una sucursal con nombre, dirección, horario de atención y capacidad máxima; cada una recibe un código único.
2. No se permite registrar dos sucursales con el mismo nombre y dirección.
3. Todos los campos de una sucursal pueden editarse; los cambios se reflejan inmediatamente en todos los módulos relacionados (clases, equipos, personal).
4. Cada modificación queda registrada con fecha y usuario responsable.
5. El sistema muestra en tiempo real los servicios disponibles y la capacidad ocupada vs. disponible por sucursal.
6. La consulta de disponibilidad es accesible para administradores, recepcionistas y clientes según su rol.

#### **Requerimientos Funcionales Relacionados**
- **RF08**: El sistema deberá permitir registrar sucursales con su dirección, horario y capacidad.
- **RF09**: El sistema deberá permitir modificar los datos operativos de cada sucursal.
- **RF10**: El sistema deberá permitir consultar la disponibilidad de servicios y recursos por sucursal.

---
## **Requerimientos No Funcionales Relevantes**
- **RNF01**: Interfaz amigable, clara y de fácil uso para todos los actores.
- **RNF03**: Autenticación mediante usuario y contraseña.
- **RNF04**: Restringir el acceso a funcionalidades según el rol del usuario.
- **RNF05**: Garantizar la integridad y consistencia de la información almacenada.
- **RNF09**: Compatibilidad con dispositivos de escritorio y móviles mediante una interfaz web responsiva.
- **RNF10**: Registrar trazabilidad básica de operaciones críticas (ej: cambios de membresía, pagos, etc.).
- **RNF12**: Preservar la seguridad de los datos personales y administrativos.