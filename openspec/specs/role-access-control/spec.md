## Purpose
Define las políticas de autenticación y control de acceso basado en roles (RBAC) para restringir el uso de funcionalidades del panel según el nivel de usuario.
## Requirements
### Requirement: Autenticación mediante usuario y contraseña
The system SHALL authenticate users via email/username and password. Passwords SHALL be stored hashed using Laravel's default hashing (bcrypt). Failed login attempts SHALL show a generic error message.

#### Scenario: Successful login
- **WHEN** a registered active user provides correct email and password
- **THEN** the system authenticates the user and redirects to the dashboard

#### Scenario: Failed login with incorrect credentials
- **WHEN** a user provides incorrect email or password
- **THEN** the system SHALL display "Credenciales incorrectas" without revealing which field is wrong

#### Scenario: Inactive user login
- **WHEN** an inactive user provides correct credentials
- **THEN** the system SHALL deny access and display "Tu cuenta está inactiva. Contacta al administrador."

### Requirement: Restricción de acceso por rol
The system SHALL restrict access to functionalities based on the user's role. The following roles and access levels SHALL be enforced:
- **Administrador**: Full access to all modules (users, branches, settings)
- **Recepcionista**: Access to user registration and branch availability view. No access to role management or user inactivation.
- **Entrenador**: Access to branch availability view and own profile view only.
- **Cliente**: Access only to branch availability consultation and own profile view

#### Scenario: Admin accesses all modules
- **WHEN** an admin navigates to any module
- **THEN** the system grants access without restriction

#### Scenario: Receptionist restricted from role management
- **WHEN** a receptionist tries to access user role management
- **THEN** the system SHALL deny access and display a 403 error or redirect

#### Scenario: Unauthenticated access
- **WHEN** an unauthenticated user tries to access any admin page
- **THEN** the system SHALL redirect to the login page

### Requirement: Interfaz responsiva
The system SHALL provide a responsive web interface compatible with desktop and mobile devices using Filament's responsive layout.

#### Scenario: Mobile device access
- **WHEN** a user accesses the system from a mobile device
- **THEN** the interface SHALL render correctly with responsive layout, readable fonts, and touch-friendly controls

### Requirement: Asignación de rol por defecto (fallback)
The system SHALL automatically assign the "cliente" role to any newly created user who does not have an explicit role assigned, ensuring baseline access control.

#### Scenario: Fallback role on creation without type
- **WHEN** a user is created via any method without an explicit role
- **THEN** the system SHALL assign the "cliente" role by default

