## Context

The Filament admin panel has a custom login page at `/admin/login` (`App\Filament\Pages\Auth\Login`) with a minimal blade view. The `UserObserver` already auto-assigns the `cliente` Spatie role on user creation when `type` is null. The `User` model accepts `name`, `email`, `password`, `ci`, `phone`, `address`, `birth_date` as fillable fields. New users should be created as active (`status = true`) with the `cliente` role — all of which is handled automatically by the existing `UserObserver::creating()` and `UserObserver::created()` observer methods.

The current system has no self-registration path; all users must be created via the admin panel by an `admin` or `recepcionista`.

## Goals / Non-Goals

**Goals:**
- Add a registration form accessible from the login page (`/admin/login`)
- New users register with `type = 'cliente'` and `status = true`
- The Spatie `cliente` role is assigned automatically (via existing UserObserver)
- The existing login flow is preserved unchanged
- Registration collects: name, email, password, password confirmation, CI, phone, address, birth_date
- Client-side and server-side validation for all fields
- Success message + redirect to login tab after registration

**Non-Goals:**
- Email verification (not required per existing system)
- Admin approval flow (registration is immediate)
- Password reset flow (not in scope)
- Modifying existing roles, permissions, or observers
- API-based registration (keeping Filament-centric approach)

## Decisions

1. **Single Page with Tabs (Filament Page + Blade)** — The Login page will be extended to include a register form as a second tab/section. Alternative: creating a separate Register page would require additional routing and break the cohesive auth flow. Decision: Keep both forms in the existing `Login` page using a `$isRegistering` state toggle, with the blade view conditionally rendering the active form.

2. **No New Controller** — The register action lives on the Login page itself as a Livewire method (`register()`), avoiding an extra controller and route. Alternative: a dedicated `RegisterController` would work but adds unnecessary indirection.

3. **Validation via Inline Rules** — Use inline validation in the `register()` method rather than a Form Request, keeping the logic self-contained in the page. Use `$this->form->getState()` for the login form, and a separate manual validation for the register form.

4. **UserObserver handles role assignment** — The page only creates the User model with fillable attributes. The observer's `creating()` sets `type = 'cliente'` and `created()` assigns the Spatie `cliente` role. No role logic needed in the page.

5. **Tailwind UI for tabs/forms** — Use simple Tailwind-styled tab buttons to toggle between "Iniciar Sesión" and "Registrarse" in the blade view, maintaining the existing Filament design aesthetic.

## Risks / Trade-offs

- [Form duplication risk] The register form re-inserts the email and password inputs alongside the login form, creating visual duplication. Mitigation: Use tabs to clearly separate the two modes.
- [Role enforcement risk] If the observer fails or is removed, new users won't get the `cliente` role. Mitigation: Relies on existing observer test coverage.
- [Login page coupling] Coupling two forms in one page increases complexity slightly. Mitigation: The forms are mutually exclusive via tabs — only one form is visible at a time.
