<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            [
                'name' => 'admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'editor',
                'guard_name' => 'web'
            ],
            [
                'name' => 'user',
                'guard_name' => 'web'
            ]
        ]);

        Permission::insert([
            // Perfil de usuario
            [
                'name' => 'profile-show',
                'guard_name' => 'web'
            ],
            [
                'name' => 'profile-edit',
                'guard_name' => 'web'
            ],
            [
                'name' => 'logout',
                'guard_name' => 'web'
            ],
            // CRUD proyectos
            [
                'name' => 'project-list',
                'guard_name' => 'web'
            ],
            [
                'name' => 'project-create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'project-show',
                'guard_name' => 'web'
            ],
            [
                'name' => 'project-update',
                'guard_name' => 'web'
            ],
            [
                'name' => 'project-activate',
                'guard_name' => 'web'
            ],
            [
                'name' => 'project-delete',
                'guard_name' => 'web'
            ],
        ]);

        $adminRole = Role::findByName('admin');
        $editorRole = Role::findByName('editor');
        $userRole = Role::findByName('user');

        $adminRole->syncPermissions(Permission::all());

        $editorRole->syncPermissions([
            'profile-show',
            'profile-edit',
            'logout',
            'project-create',
            'project-show',
            'project-update',
            'project-activate'
        ]);

        $userRole->syncPermissions([
            'profile-show',
            'profile-edit',
            'logout'
        ]);
    }
}
