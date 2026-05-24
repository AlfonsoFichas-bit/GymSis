## MODIFIED Requirements

### Requirement: Autenticación mediante usuario y contraseña
The system SHALL authenticate users via email/username and password. Passwords SHALL be stored hashed using Laravel's default hashing (bcrypt). Failed login attempts SHALL show a generic error message. Active sessions SHALL be terminated immediately if a user's status becomes inactive.

#### Scenario: Successful login
- **WHEN** a registered active user provides correct email and password
- **THEN** the system authenticates the user and redirects to the dashboard

#### Scenario: Failed login with incorrect credentials
- **WHEN** a user provides incorrect email or password
- **THEN** the system SHALL display "Credenciales incorrectas" without revealing which field is wrong

#### Scenario: Inactive user login
- **WHEN** an inactive user provides correct credentials
- **THEN** the system SHALL deny access and display "Tu cuenta está inactiva. Contacta al administrador."

#### Scenario: Logged-in user becomes inactive
- **WHEN** an active user is logged in and their status is updated to inactive in the database
- **THEN** the system SHALL immediately deny access on the next request and require authentication
