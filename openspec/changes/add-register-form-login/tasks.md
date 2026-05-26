## 1. Modify Login Page Class

- [x] 1.1 Add `$isRegistering` public property (default `false`) and `$registerData` array to the Login page
- [x] 1.2 Add a `register()` Livewire method that validates registration fields (name, email, password, password_confirmation, ci, phone, address, birth_date), creates the User, dispatches success notification, and resets to login tab
- [x] 1.3 Add a `switchToRegister()` and `switchToLogin()` toggle methods

## 2. Customize the Login Blade View

- [x] 2.1 Replace the minimal login view with a tabbed layout: "Iniciar Sesión" and "Registrarse" tabs
- [x] 2.2 Render the existing login form under the "Iniciar Sesión" tab
- [x] 2.3 Render the registration form under the "Registrarse" tab with fields: nombre, email, contraseña, confirmar contraseña, CI, teléfono, dirección, fecha de nacimiento
- [x] 2.4 Add Tailwind styling for tab buttons (active/inactive states, transitions) matching Filament's design system

## 3. Validation & User Creation

- [x] 3.1 Add inline validation rules for all registration fields (required: name, email, password, password_confirmation; optional: ci, phone, address, birth_date)
- [x] 3.2 Validate email uniqueness against the users table
- [x] 3.3 Validate password confirmation match and minimum length (8 characters)
- [x] 3.4 Create User with `status = true` (UserObserver handles `type = 'cliente'` and Spatie role assignment)
- [x] 3.5 Show success notification: "Registro exitoso. Ahora puedes iniciar sesión." and switch back to login tab

## 4. Enable Registration in Panel

- [x] 4.1 Enable `->registration()` on the AdminPanelProvider if using Filament's built-in approach, OR verify the custom page approach works without it
- [x] 4.2 Test that the login page renders both tabs correctly
- [x] 4.3 Test that registration creates a user with `cliente` role
- [x] 4.4 Test that the newly registered user can log in

## 5. Run QA

- [x] 5.1 Run `vendor/bin/pint --format agent` to ensure code style compliance
- [x] 5.2 Run `php artisan test --compact` to verify existing tests still pass
