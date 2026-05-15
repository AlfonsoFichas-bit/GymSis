## ADDED Requirements

### Requirement: Registrar usuarios con datos personales y tipo
The system SHALL allow administrators and receptionists to register users with full personal data including full name, CI (cédula de identidad), email, phone, address, birth date, and user type (cliente, empleado, administrador).

#### Scenario: Successful user registration
- **WHEN** an admin fills the registration form with valid personal data and selects a user type
- **THEN** the system creates the user record and assigns the corresponding role automatically

#### Scenario: Duplicate CI validation
- **WHEN** an admin tries to register a user with a CI that already exists in the system
- **THEN** the system SHALL reject the registration and display a validation error "El CI ya está registrado"

### Requirement: Editar datos de usuarios sin alterar historial
The system SHALL allow editing of any user's personal data. Previous values SHALL be preserved in the activity log without altering the main record's history.

#### Scenario: Successful user data update
- **WHEN** an admin edits a user's personal data
- **THEN** the system updates the user record and logs the previous values with timestamp and responsible user

### Requirement: Inactivar usuarios preservando registros
The system SHALL allow user inactivation. Inactivated users SHALL NOT be able to log in, but their historical records SHALL remain intact in the system.

#### Scenario: User inactivation
- **WHEN** an admin inactivates a user
- **THEN** the system sets the user as inactive, blocks login access, and logs the action with date and responsible user

#### Scenario: Inactive user login attempt
- **WHEN** an inactive user attempts to log in
- **THEN** the system SHALL deny access and display "Tu cuenta está inactiva. Contacta al administrador."

### Requirement: Asignar y modificar roles
The system SHALL assign a role (cliente, empleado, administrador, recepcionista) to each user upon registration. An admin SHALL be able to change a user's role at any time.

#### Scenario: Role modification by admin
- **WHEN** an admin changes a user's role
- **THEN** the system updates the role and logs the change with date and responsible user

#### Scenario: Role-based access restriction
- **WHEN** a user with role "cliente" tries to access admin functionality
- **THEN** the system SHALL deny access and redirect to the dashboard

### Requirement: Trazabilidad de cambios de estado
Every user state change (creation, update, inactivation, role change) SHALL be recorded with timestamp, previous values, new values, and the responsible user.

#### Scenario: Complete audit trail
- **WHEN** any user modification occurs
- **THEN** the system SHALL persist an audit log entry with action type, affected user ID, previous data, new data, responsible user ID, and timestamp
