## 1. Rol y Tipo de Usuario "Entrenador"

- [x] 1.1 Agregar `entrenador` al array de tipos en el modelo User (cast/attribute si existe)
- [x] 1.2 Agregar `entrenador` como opción en el Select de tipo de usuario en UserForm (Schemas/UserForm.php)
- [x] 1.3 Actualizar RoleSeeder para crear el rol "entrenador" con permisos: ViewAny:Branch, View:Branch, view_availability:Branch
- [x] 1.4 Ejecutar seeder para crear el nuevo rol en la base de datos
- [x] 1.5 Verificar que el rol entrenador aparece en el selector de roles en UserResource

## 2. Asignación de Rol por Defecto (Fallback)

- [x] 2.1 Crear un Observer o evento en User model que asigne el rol "cliente" si el usuario no tiene roles después de creado
- [x] 2.2 Asegurar que la asignación explícita de tipo (admin, recepcionista, etc.) tenga prioridad sobre el fallback
- [x] 2.3 Verificar que usuarios existentes sin rol reciban el rol "cliente" (comando one-time o lógica en seeder)

## 3. Respaldo Automático de Base de Datos

- [x] 3.1 Crear comando Artisan `backup:database` que copie `database/database.sqlite` a `storage/backups/database-YYYY-MM-DD_HH-mm-ss.sqlite`
- [x] 3.2 Crear directorio `storage/backups/` con archivo `.gitignore` apropiado
- [x] 3.3 Registrar el comando en `routes/console.php` o `Kernel::schedule()` para ejecución diaria a las 2:00 AM
- [x] 3.4 Verificar que el comando funciona manualmente con `php artisan backup:database`

## 4. Pruebas de Rendimiento (RNF02)

- [x] 4.1 Crear test `tests/Feature/PerformanceTest.php` con medición de tiempo para listado de usuarios
- [x] 4.2 Agregar test de rendimiento para creación de usuario
- [x] 4.3 Agregar test de rendimiento para listado de sucursales
- [x] 4.4 Establecer umbral de ≤ 3 segundos para entorno local y ≤ 5 segundos como límite general

## 5. Pruebas de Bloqueo Post-Logout (HU-02 C5)

- [x] 5.1 Crear test que autentica un usuario, cierra sesión y verifica redirección al intentar acceder a /admin/users
- [x] 5.2 Crear test que verifica redirección post-logout para /admin/branches
- [x] 5.3 Verificar que la sesión se destruye correctamente y no hay acceso a datos protegidos

## 6. Verificación Final

- [x] 6.1 Ejecutar `vendor/bin/pint --format agent` para corregir estilo de código
- [x] 6.2 Ejecutar suite completa de tests `php artisan test --compact`
- [x] 6.3 Verificar que los tests existentes sigan pasando (AuthTest, UserTest, BranchTest)
