## ADDED Requirements

### Requirement: Tipo de usuario "Entrenador"
The system SHALL include "Entrenador" as a valid user type option in the user registration and edit forms, and SHALL create the corresponding "entrenador" role with appropriate permissions.

#### Scenario: Register user as Entrenador
- **WHEN** an admin selects "Entrenador" as the user type during registration
- **THEN** the system creates the user with type "entrenador" and assigns the "entrenador" role

#### Scenario: Edit user type to Entrenador
- **WHEN** an admin changes an existing user's type to "Entrenador"
- **THEN** the system updates the user type and reassigns the role to "entrenador"

### Requirement: Permisos del rol Entrenador
The "entrenador" role SHALL have permissions to view branch information and availability, and to view their own user profile.

#### Scenario: Entrenador views branches
- **WHEN** an entrenador navigates to the branches section
- **THEN** the system grants access to view branches and their availability

#### Scenario: Entrenador restricted from user management
- **WHEN** an entrenador tries to access user management pages
- **THEN** the system SHALL deny access and display a 403 error or redirect
