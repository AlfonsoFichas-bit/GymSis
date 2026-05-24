## ADDED Requirements

### Requirement: Admin can view and modify user roles from control panel
The system SHALL allow an administrator to view and modify the role of any user from the Filament control panel.

#### Scenario: Admin can access user edit page and see role selector
- **WHEN** an authenticated admin navigates to edit a user
- **THEN** the page SHALL display a type/role selector and allow changing it

#### Scenario: Non-admin cannot modify user roles
- **WHEN** a non-admin user (e.g., cliente, empleado) navigates to edit a user
- **THEN** the role/type selector SHALL be disabled or the page SHALL return a 403
