## MODIFIED Requirements

### Requirement: Registrar usuarios con datos personales y tipo
The system SHALL allow administrators and receptionists to register users with full personal data including full name, CI (cédula de identidad), email, phone, address, birth date, and user type (cliente, empleado, administrador, **entrenador**).

#### Scenario: Successful user registration
- **WHEN** an admin fills the registration form with valid personal data and selects a user type (including "entrenador")
- **THEN** the system creates the user record and assigns the corresponding role automatically

#### Scenario: Duplicate CI validation
- **WHEN** an admin tries to register a user with a CI that already exists in the system
- **THEN** the system SHALL reject the registration and display a validation error "El CI ya está registrado"

### Requirement: Asignar y modificar roles
The system SHALL assign a role (cliente, empleado, administrador, recepcionista, **entrenador**) to each user upon registration. An admin SHALL be able to change a user's role at any time.

#### Scenario: Role modification by admin
- **WHEN** an admin changes a user's role
- **THEN** the system updates the role and logs the change with date and responsible user

#### Scenario: Role-based access restriction
- **WHEN** a user with role "cliente" tries to access admin functionality
- **THEN** the system SHALL deny access and redirect to the dashboard
