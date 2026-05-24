<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear el rol admin si no existe y asegurar permisos (ejecuta el seeder de roles)
        $this->call(RoleSeeder::class);

        // Crear usuario administrador por defecto
        $admin = User::factory()->create([
            'name' => 'Admin GymSis',
            'email' => 'admin@gymsis.com',
            'password' => Hash::make('Admin123!'), // Contraseña segura: Min, May, Num, Especial
            'type' => 'admin',
        ]);

        // Asignar el rol de administrador de Spatie
        $admin->assignRole('admin');

        // Otros datos de prueba, para poblar la base de datos
        // $this->call(DummyDataSeeder::class);
    }
}
