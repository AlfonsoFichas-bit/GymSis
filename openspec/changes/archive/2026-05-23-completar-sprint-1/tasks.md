## 1. Programación del Respaldo de Base de Datos (RNF05)

- [x] 1.1 Copiar la programación diaria de respaldos desde `resources/routes/console.php` hacia el archivo activo de la aplicación `routes/console.php`.
- [x] 1.2 Eliminar la carpeta redundante/inactiva `resources/routes/` del workspace para evitar confusiones de rutas.
- [x] 1.3 Verificar manualmente la lista de comandos programados con `php artisan schedule:list` para asegurar que `backup:database` esté cargado a las 02:00 AM.

## 2. Bloqueo Inmediato de Sesión para Usuarios Inactivos (HU-04)

- [x] 2.1 Actualizar el método `canAccessPanel` en el modelo `User` para verificar `$this->status === true`.
- [x] 2.2 Crear un test de integración en Pest que autentique a un usuario, actualice su estado a inactivo, intente acceder a una ruta protegida en Filament y verifique que el acceso sea denegado de forma inmediata.

## 3. Consistencia y Auditoría de Roles (HU-03)

- [x] 3.1 Editar `UserForm.php` para remover el selector de `roles` directo de Spatie.
- [x] 3.2 Asegurar que el selector de `type` siga activo y sea el único canal para asignar el rol operativo a través del `UserObserver`.
- [x] 3.3 Escribir un test que verifique que el cambio del campo `type` de un usuario genera una entrada en el historial de auditoría de Spatie Activitylog con el ID del administrador responsable y la fecha.

## 4. Verificación y Estilo de Código

- [x] 4.1 Ejecutar Laravel Pint para formatear todos los archivos PHP modificados.
- [x] 4.2 Ejecutar la suite completa de pruebas con Pest para asegurar que todos los tests antiguos y nuevos pasen correctamente.
