## MODIFIED Requirements

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

## ADDED Requirements

### Requirement: Asignación de rol por defecto (fallback)
The system SHALL automatically assign the "cliente" role to any newly created user who does not have an explicit role assigned, ensuring baseline access control.

#### Scenario: Fallback role on creation without type
- **WHEN** a user is created via any method without an explicit role
- **THEN** the system SHALL assign the "cliente" role by default
