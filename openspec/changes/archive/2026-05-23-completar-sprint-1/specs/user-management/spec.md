## MODIFIED Requirements

### Requirement: Asignar y modificar roles
The system SHALL assign a role (cliente, empleado, administrador, recepcionista, entrenador) to each user upon registration based on their user type. An admin SHALL be able to change a user's role at any time by modifying their user type in the admin panel.

#### Scenario: Role modification by admin
- **WHEN** an admin changes a user's type in the admin panel
- **THEN** the system updates the user's type, automatically syncs the corresponding role, and logs the type change with the date and responsible user in the activity log

#### Scenario: Role-based access restriction
- **WHEN** a user with role "cliente" tries to access admin functionality
- **THEN** the system SHALL deny access and redirect to the dashboard
