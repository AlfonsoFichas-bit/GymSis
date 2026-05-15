<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            'user.view',
            'user.create',
            'user.edit',
            'user.inactivate',
            'user.assign_role',
            'branch.view',
            'branch.create',
            'branch.edit',
            'branch.view_availability',
        ];

        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission);
        }

        // Create roles and assign permissions
        $admin = Role::findOrCreate('admin');
        $admin->givePermissionTo(Permission::all());

        $recepcionista = Role::findOrCreate('recepcionista');
        $recepcionista->givePermissionTo([
            'user.view',
            'user.create',
            'user.edit',
            'branch.view',
            'branch.view_availability',
        ]);

        $empleado = Role::findOrCreate('empleado');
        $empleado->givePermissionTo([
            'branch.view',
            'branch.view_availability',
        ]);

        $cliente = Role::findOrCreate('cliente');
        $cliente->givePermissionTo([
            'branch.view_availability',
        ]);
    }
}
