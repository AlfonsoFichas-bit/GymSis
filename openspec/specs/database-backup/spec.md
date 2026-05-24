# database-backup Specification

## Purpose
TBD - created by archiving change sprint-1-usuarios-roles-autenticacion. Update Purpose after archive.
## Requirements
### Requirement: Respaldo automático de base de datos
The system SHALL provide an Artisan command to create a backup copy of the SQLite database file. The command SHALL be scheduled to run daily at a configurable time and SHALL preserve backups with timestamps.

#### Scenario: Manual backup via Artisan command
- **WHEN** an admin runs `php artisan backup:database`
- **THEN** the system creates a timestamped copy of the database file in the `storage/backups/` directory

#### Scenario: Scheduled daily backup
- **WHEN** the scheduled time for backup is reached
- **THEN** the system automatically creates a backup without manual intervention

#### Scenario: Backup file naming
- **WHEN** a backup is created
- **THEN** the backup file SHALL be named with the format `database-YYYY-MM-DD_HH-mm-ss.sqlite`

