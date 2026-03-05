<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'view students',
            'create students',
            'edit students',
            'delete students',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo($permissions);

        $editorRole = Role::create(['name' => 'editor']);
        $editorRole->givePermissionTo(['view students', 'edit students']);

        // Assign admin role to an existing user (change ID as needed)
        $user = User::find(1);
        if ($user) {
            $user->assignRole('admin');
        }
    }
}