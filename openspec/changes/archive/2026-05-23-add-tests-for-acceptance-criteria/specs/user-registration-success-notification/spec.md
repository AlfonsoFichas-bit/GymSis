## ADDED Requirements

### Requirement: Success notification on user registration
The system SHALL display a success notification when a new user is registered successfully.

#### Scenario: Admin creates a new user and sees success notification
- **WHEN** an authenticated admin fills the CreateUser form with valid data and submits
- **THEN** the system SHALL create the user record and display a success notification

#### Scenario: Registration redirects to index page after success
- **WHEN** an admin successfully creates a user
- **THEN** the system SHALL redirect to the users list page
