## ADDED Requirements

### Requirement: Editing user data does not alter existing history
The system SHALL allow editing personal data of any user without altering their associated historical records (activity logs).

#### Scenario: Editing user name does not affect prior activity logs
- **WHEN** an admin edits a user's name
- **THEN** the existing activity log entries for that user SHALL remain unchanged

#### Scenario: Editing user email preserves previous activity log entries
- **WHEN** an admin changes a user's email address
- **THEN** the previous activity log entries SHALL still reference the correct user and SHALL contain the original and updated values
