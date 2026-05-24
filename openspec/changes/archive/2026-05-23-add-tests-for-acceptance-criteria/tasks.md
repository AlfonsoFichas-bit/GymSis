## 1. Success notification on registration (HU-01 AC3)

- [x] 1.1 Create test `it('redirects after successful user creation')` usando Livewire para llenar formulario y verificar redirección
- [x] 1.2 Run `php artisan test --compact --filter=CreateUserTest` para verificar que pasa

## 2. Logout button visibility (HU-02 AC2)

- [x] 2.1 Create test `it('shows logout button on admin page when authenticated')` usando HTTP GET y `assertSee('Salir')`
- [x] 2.2 Run `php artisan test --compact --filter=LogoutButtonTest` para verificar

## 3. Admin can view and modify roles (HU-03 AC2)

- [x] 3.1 Create test `it('admin can view user edit page with role selector')` usando HTTP GET para admin autenticado
- [x] 3.2 Create test `it('cliente user cannot access other user edit page')` usando HTTP GET para usuario sin permiso
- [x] 3.3 Run `php artisan test --compact --filter=RoleModificationTest` para verificar

## 4. Role-based access blocking (HU-03 AC3)

- [x] 4.1 Create test `it('cliente user receives forbidden on user creation page')` usando HTTP GET para cliente autenticado
- [x] 4.2 Create test `it('admin user can access user creation page')` usando HTTP GET para admin autenticado
- [x] 4.3 Run `php artisan test --compact --filter=RoleAccessBlockTest` para verificar

## 5. Editing user preserves history (HU-04 AC1)

- [x] 5.1 Create test `it('editing user name preserves previous activity log entries')` editando usuario y verificando activity log existente
- [x] 5.2 Run `php artisan test --compact --filter=UserEditHistoryTest` para verificar

## 6. Inactivation preserves records (HU-04 AC3)

- [x] 6.1 Create test `it('user record remains in database after inactivation')` verificando existencia del registro en BD tras status=false
- [x] 6.2 Create test `it('inactive user login is rejected')` reproduciendo `AuthTest` para usuario inactivo
- [x] 6.3 Run `php artisan test --compact --filter=InactivationPreserveTest` para verificar

## 7. Run full test suite

- [x] 7.1 Run `php artisan test --compact` para verificar que todos los tests (nuevos + existentes) pasan correctamente
- [x] 7.2 Run `vendor/bin/pint --format agent` para formatear el código
