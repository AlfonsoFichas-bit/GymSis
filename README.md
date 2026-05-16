# GymSis - Sistema de Gestión de Gimnasio

GymSis es una plataforma integral para la gestión de gimnasios construida con Laravel, Filament y Tailwind CSS.

## Requisitos Previos

- PHP 8.3+
- Composer
- Node.js & NPM
- SQLite (o tu base de datos preferida)

## Instalación y Configuración

Sigue estos pasos para poner en marcha el proyecto después de clonarlo:

### 1. Clonar el repositorio
```bash
git clone <url-del-repositorio>
cd GymSis
```

### 2. Instalar dependencias de PHP
```bash
composer install
```

### 3. Instalar dependencias de JavaScript
```bash
npm install
```

### 4. Configurar el archivo de entorno
Copia el archivo de ejemplo y genera la clave de la aplicación:
```bash
cp .env.example .env
php artisan key:generate
```
*Nota: Asegúrate de configurar tu conexión a la base de datos en el archivo `.env`. Por defecto, el proyecto usa SQLite.*

### 5. Preparar la base de datos
Ejecuta las migraciones y carga los datos de prueba (incluyendo el usuario administrador):
```bash
php artisan migrate:fresh --seed
```

### 6. Compilar assets del frontend
```bash
npm run build
```

## Ejecución del Proyecto

Para empezar a desarrollar, necesitas ejecutar tanto el servidor de Laravel como el de Vite:

```bash
# Servidor de Laravel
php artisan serve

# Servidor de Vite (para hot-reload de estilos/scripts)
npm run dev
```

## Credenciales de Acceso (Entorno de Desarrollo)

Una vez ejecutado el seeder, puedes acceder al panel administrativo con las siguientes credenciales:

- **URL:** `http://localhost:8000/admin`
- **Usuario:** `admin@gymsis.com`
- **Contraseña:** `Admin123!`

## Tecnologías Utilizadas

- **Backend:** [Laravel 11+](https://laravel.com)
- **Panel Administrativo:** [Filament v3](https://filamentphp.com)
- **Frontend:** [Tailwind CSS v4](https://tailwindcss.com) y Vite
- **Roles y Permisos:** [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission/v6)
- **Testing:** [Pest PHP](https://pestphp.com)

---
