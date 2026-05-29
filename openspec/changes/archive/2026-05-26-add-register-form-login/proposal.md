## Why

The landing page has an "Iniciar Sesión" button but no way for new clients to register themselves. Currently, users can only be created through the admin panel (`admin/users/create`), requiring an admin or recepcionista to manually create each account. Adding a self-registration form on the login page allows new clients to sign up directly with the "cliente" role, reducing onboarding friction and administrative overhead.

## What Changes

- Add a register tab/form alongside the existing login form on the Filament auth page (`filament.admin.auth.login`)
- The registration form collects: name, email, password, password confirmation, CI, phone, address, birth_date
- On submit, create the user with `type = 'cliente'` and `status = true`, assign the Spatie `cliente` role (already handled by UserObserver)
- Show success message and redirect to login after registration
- The login view needs a tab/link toggle between login and register forms

## Capabilities

### New Capabilities
- `register-form`: Self-registration form on the login page that creates users with the "cliente" role via Spatie

### Modified Capabilities

None.

## Impact

- `app/Filament/Pages/Auth/Login.php` — Extend or modify to include register form
- `resources/views/filament/pages/auth/login.blade.php` — Add register form UI with toggle tabs
- `app/Http/Controllers/RegisterController.php` — New controller for handling registration (if using API approach)
- `routes/web.php` — Add POST route for registration if using controller approach
- `database/seeders/RoleSeeder.php` — Unchanged (cliente role already exists)
- `app/Observers/UserObserver.php` — Unchanged (already assigns "cliente" role when type is null)
