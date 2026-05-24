## ADDED Requirements

### Requirement: System blocks access to modules based on user role
The system SHALL block access to specific modules if the user does not have the corresponding role/permission.

#### Scenario: User without permission receives 403 on restricted page
- **WHEN** a user without the required permission (e.g., a `cliente` user) tries to access a restricted page (e.g., `/admin/users/create`)
- **THEN** the system SHALL return a 403 Forbidden response

#### Scenario: User with permission can access the page
- **WHEN** a user with the required permission (e.g., an `admin` user) tries to access the same page
- **THEN** the system SHALL return a 200 OK response
