<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Shield Permissions
        $models = ['User', 'Branch', 'Role'];
        $actions = ['ViewAny', 'View', 'Create', 'Update', 'Delete', 'DeleteAny', 'Restore', 'RestoreAny', 'ForceDelete', 'ForceDeleteAny', 'Replicate', 'Reorder'];

        foreach ($models as $model) {
            foreach ($actions as $action) {
                Permission::findOrCreate("{$action}:{$model}");
            }
        }

        Permission::findOrCreate('view_availability:Branch');
        Permission::findOrCreate('inactivate:User');

        // Create roles and assign permissions
        $admin = Role::findOrCreate('admin');
        $admin->givePermissionTo(Permission::all());

        $recepcionista = Role::findOrCreate('recepcionista');
        $recepcionista->givePermissionTo([
            'ViewAny:User',
            'View:User',
            'Create:User',
            'Update:User',
            'ViewAny:Branch',
            'View:Branch',
            'view_availability:Branch',
        ]);

        $empleado = Role::findOrCreate('empleado');
        $empleado->givePermissionTo([
            'ViewAny:Branch',
            'View:Branch',
            'view_availability:Branch',
        ]);

        $cliente = Role::findOrCreate('cliente');
        $cliente->givePermissionTo([
            'ViewAny:Branch',
            'View:Branch',
            'view_availability:Branch',
        ]);
    }
}
