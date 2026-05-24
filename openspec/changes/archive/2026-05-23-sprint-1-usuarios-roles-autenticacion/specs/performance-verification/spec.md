## ADDED Requirements

### Requirement: Tiempo de respuesta ≤ 5 segundos
The system SHALL respond to all main operations (user CRUD, branch CRUD, login/logout) within 5 seconds under normal load conditions.

#### Scenario: User listing response time
- **WHEN** an admin requests the user listing page
- **THEN** the system SHALL render the page in ≤ 5 seconds

#### Scenario: User creation response time
- **WHEN** an admin submits a new user registration form
- **THEN** the system SHALL process and redirect in ≤ 5 seconds

#### Scenario: Branch listing response time
- **WHEN** an admin requests the branch listing page
- **THEN** the system SHALL render the page in ≤ 5 seconds
