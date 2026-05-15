## ADDED Requirements

### Requirement: Registrar sucursales con datos operativos
The system SHALL allow administrators to register branches with name, address, operating hours (opening/closing time per day), maximum capacity, and an auto-generated unique branch code.

#### Scenario: Successful branch registration
- **WHEN** an admin fills the branch registration form with valid data
- **THEN** the system creates the branch record with a unique auto-generated code

#### Scenario: Duplicate branch name and address
- **WHEN** an admin tries to register a branch with the same name and address as an existing one
- **THEN** the system SHALL reject the registration and display a validation error "Ya existe una sucursal con ese nombre y dirección"

### Requirement: Editar datos operativos de sucursales
The system SHALL allow editing of all branch fields. Changes SHALL be reflected immediately in all related modules (classes, equipment, personnel). Each modification SHALL be logged with date and responsible user.

#### Scenario: Successful branch update
- **WHEN** an admin edits a branch's operating hours or capacity
- **THEN** the system updates the branch record, logs the change with timestamp and responsible user

### Requirement: Consultar disponibilidad de servicios y recursos por sucursal
The system SHALL display real-time availability of services and resources per branch, showing occupied vs. available capacity. This consultation SHALL be accessible to administrators, receptionists, and clients according to their role.

#### Scenario: Admin views branch availability
- **WHEN** an admin accesses the branch detail page
- **THEN** the system displays current capacity (occupied/total), available services, and available resources for that branch

#### Scenario: Client views branch availability
- **WHEN** a client (customer) accesses the branch list
- **THEN** the system shows available services and general capacity per branch without administrative controls

#### Scenario: Real-time capacity update
- **WHEN** a new member is registered at a branch or a class is scheduled
- **THEN** the system SHALL update the occupied capacity count accordingly
