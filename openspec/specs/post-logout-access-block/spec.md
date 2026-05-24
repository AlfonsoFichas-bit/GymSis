# post-logout-access-block Specification

## Purpose
TBD - created by archiving change sprint-1-usuarios-roles-autenticacion. Update Purpose after archive.
## Requirements
### Requirement: Bloqueo de acceso post-logout
The system SHALL redirect any user attempting to access internal URLs after logging out to the login page, and SHALL NOT reveal any protected content.

#### Scenario: Post-logout access to admin page
- **WHEN** an authenticated user logs out and then tries to access an admin page
- **THEN** the system SHALL redirect to the login page and require re-authentication

#### Scenario: Post-logout access to branch page
- **WHEN** an authenticated user logs out and then tries to access a branch management page
- **THEN** the system SHALL redirect to the login page and require re-authentication

