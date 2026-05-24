## 1. Setup & Dependencies

- [x] 1.1 Install spatie/laravel-permission via Composer
- [x] 1.2 Install spatie/laravel-activitylog via Composer
- [x] 1.3 Publish and run Spatie migrations (permissions, activitylog)
- [x] 1.4 Configure Filament admin panel (create admin user, configure provider)

## 2. User Model Extensions & Migration

- [x] 2.1 Create migration to add columns to users table: ci (unique), phone, address, birth_date, status (active/inactive), type (cliente/empleado/admin)
- [x] 2.2 Update User model with fillable fields, casts, and relationships
- [x] 2.3 Create UserFactory with new fields
- [x] 2.4 Create a Form Request for user registration/update with CI uniqueness validation

## 3. Roles & Permissions Setup

- [x] 3.1 Create role seeder: admin, recepcionista, cliente, empleado
- [x] 3.2 Assign permissions per role (user.view, user.create, user.edit, user.inactivate, user.assign_role, branch.view, branch.create, branch.edit, branch.view_availability)
- [x] 3.3 Auto-assign role on user creation based on user type
- [x] 3.4 Implement Filament Shield integration or custom middleware for role-based access

## 4. Branch Module

- [x] 4.1 Create Branch model with migration: code (unique), name, address, opening_time, closing_time, max_capacity, status
- [x] 4.2 Create BranchService model + migration (branch_id, name, description, capacity, current_occupancy)
- [x] 4.3 Create BranchResource model + migration (branch_id, name, type, total_quantity, available_quantity)
- [x] 4.4 Implement auto-generated unique branch code (e.g., SUC-001 format)
- [x] 4.5 Create Form Request for branch registration with duplicate name+address validation
- [x] 4.6 Create BranchFactory and BranchServiceFactory

## 5. Activity Log Integration

- [x] 5.1 Configure Activitylog on User model (log fills, updates, deactivations)
- [x] 5.2 Configure Activitylog on Branch model (log fills, updates)
- [x] 5.3 Add custom log messages in Spanish for all tracked events

## 6. Filament Resources

- [x] 6.1 Create UserResource with full CRUD (index, create, edit, view)
- [x] 6.2 Add status toggle (active/inactive) in UserResource
- [x] 6.3 Add role assignment field in UserResource (select from available roles)
- [x] 6.4 Add CI validation rule in UserResource forms
- [x] 6.5 Create BranchResource with full CRUD (index, create, edit, view)
- [x] 6.6 Add operating hours fields in BranchResource (time pickers per day)
- [x] 6.7 Add branch services and resources as repeatable/repeater fields or relation managers
- [x] 6.8 Add availability widget in BranchResource showing occupied vs max capacity
- [x] 6.9 Configure navigation and group labels in Spanish

## 7. Authentication & Access Control

- [x] 7.1 Configure Filament authentication (login page with email + password)
- [x] 7.2 Block inactive users from logging in (custom authentication logic)
- [x] 7.3 Apply role-based middleware to Filament Resources and Pages
- [x] 7.4 Restrict recepcionista: hide role management and inactivation features
- [x] 7.5 Restrict cliente: show only branch availability view and own profile

## 8. Testing

- [x] 8.1 Write feature tests for user registration with CI uniqueness
- [x] 8.2 Write feature tests for user inactivation and login block
- [x] 8.3 Write feature tests for role assignment and access restriction
- [x] 8.4 Write feature tests for branch CRUD
- [x] 8.5 Write feature tests for branch duplicate name+address validation
- [x] 8.6 Write feature tests for activity log entries on user/branch changes

## 9. Final Verification

- [x] 9.1 Run `vendor/bin/pint --format agent` to fix code style
- [x] 9.2 Run full test suite `php artisan test --compact`
- [x] 9.3 Run `php artisan route:list` to verify all routes are registered
- [x] 9.4 Verify Filament panel loads correctly with seeded data
