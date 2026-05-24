## ADDED Requirements

### Requirement: Logout button visibility after authentication
The system SHALL display a visible "Cerrar Sesión" button or link in the interface after the user authenticates.

#### Scenario: Authenticated user sees logout button on panel pages
- **WHEN** an authenticated user visits any admin panel page
- **THEN** the page SHALL contain a visible "Cerrar Sesión" button or link

#### Scenario: Logout button is not visible on login page
- **WHEN** an unauthenticated user visits the login page
- **THEN** the page SHALL NOT contain a logout button
