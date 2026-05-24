## ADDED Requirements

### Requirement: Inactivation preserves user's previous records
The system SHALL preserve all previous records of a user after they are marked as inactive.

#### Scenario: User record remains in database after inactivation
- **WHEN** an admin marks a user as inactive (status = false)
- **THEN** the user record SHALL still exist in the database with their original data

#### Scenario: User login is blocked after inactivation
- **WHEN** an inactive user attempts to log in
- **THEN** the system SHALL reject the login attempt with a validation error
