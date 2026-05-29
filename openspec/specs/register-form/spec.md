## ADDED Requirements

### Requirement: Registration tab on login page
The login page SHALL display a toggle between "Iniciar Sesión" and "Registrarse" tabs. Only one tab SHALL be visible at a time. The login tab SHALL show existing login form behavior. The register tab SHALL show the registration form.

#### Scenario: Login page shows register tab
- **WHEN** user visits `/admin/login`
- **THEN** the page displays two tabs labeled "Iniciar Sesión" and "Registrarse"
- **AND** "Iniciar Sesión" is active by default with the login form visible

#### Scenario: Switching to register tab
- **WHEN** user clicks "Registrarse" tab
- **THEN** the login form is hidden and the registration form is displayed

#### Scenario: Switching back to login tab
- **WHEN** user clicks "Iniciar Sesión" tab while on the register tab
- **THEN** the registration form is hidden and the login form is displayed

### Requirement: Registration form validation
The registration form SHALL validate all required fields before submitting. The form SHALL display validation errors inline below each field.

#### Scenario: Validates required fields on submission
- **WHEN** user submits the registration form with empty fields
- **THEN** inline validation errors are shown for all required fields (name, email, password, password confirmation)

#### Scenario: Validates email format
- **WHEN** user enters an invalid email format
- **THEN** a validation error is shown: "El campo email debe ser un correo electrónico válido"

#### Scenario: Validates password minimum length
- **WHEN** user enters a password shorter than 8 characters
- **THEN** a validation error is shown stating the minimum length requirement

#### Scenario: Validates password confirmation match
- **WHEN** user enters different passwords in password and password confirmation fields
- **THEN** a validation error is shown: "Las contraseñas no coinciden"

#### Scenario: Validates unique email
- **WHEN** user enters an email already registered in the system
- **THEN** a validation error is shown: "El email ya está registrado"

### Requirement: New user registration
The system SHALL create a new User with `status = true` and `type = 'cliente'` upon valid registration. The existing UserObserver SHALL handle assigning the Spatie `cliente` role.

#### Scenario: Successful registration
- **WHEN** user fills all required fields correctly and submits
- **THEN** a new User is created with the provided data
- **AND** `status` is set to `true`
- **AND** `type` is set to `cliente`
- **AND** the Spatie `cliente` role is assigned (via UserObserver)
- **AND** a success notification is shown: "Registro exitoso. Ahora puedes iniciar sesión."
- **AND** the form switches back to the login tab

#### Scenario: After registration, user can log in with new credentials
- **WHEN** a newly registered user enters their email and password in the login form
- **THEN** authentication succeeds and the user is redirected to the dashboard

### Requirement: Registration form fields
The registration form SHALL include fields for: name, email, password, password confirmation, CI (cédula), phone, address, and birth date. CI, phone, address, and birth date SHALL be optional fields.

#### Scenario: All form fields are present
- **WHEN** user views the registration tab
- **THEN** fields are displayed: nombre, email, contraseña, confirmar contraseña, CI, teléfono, dirección, fecha de nacimiento
- **AND** name, email, password, and password confirmation are marked as required
- **AND** CI, teléfono, dirección, and fecha de nacimiento are optional
