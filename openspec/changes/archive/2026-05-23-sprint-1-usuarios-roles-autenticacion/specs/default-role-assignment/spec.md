## ADDED Requirements

### Requirement: Rol por defecto al crear usuario
The system SHALL automatically assign the "cliente" role to any newly created user who does not have an explicit role assigned, ensuring no user exists without a role.

#### Scenario: Default role assignment on creation
- **WHEN** a user is created without explicitly selecting a role or type
- **THEN** the system SHALL automatically assign the "cliente" role to the user

#### Scenario: Explicit role takes precedence
- **WHEN** a user is created with an explicitly selected type (e.g., "admin")
- **THEN** the system SHALL assign the corresponding role and NOT override with the default
