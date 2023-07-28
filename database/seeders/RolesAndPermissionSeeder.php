<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $editor = Role::create(['name' => 'editor']);
        $user = Role::create(['name' => 'user']);

        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'view']);
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);

        $admin->givePermissionTo(Permission::all());
        $editor->givePermissionTo(['create', 'view', 'edit']);
        $user->givePermissionTo(['view']);
        
        $users = User::all();

        foreach($users as $user) {
            $user->assignRole('user');
        }

        $admin1 = User::create([
            'name' => 'admin',
            'email' => 'ross@dev.xyz',
            'password' => bcrypt('admin123'), // password
        ]);

        $user1 = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        $editor1 = User::create([
            'name' => 'editor',
            'email' => 'editor@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        $admin1->assignRole('admin');
        $editor1->assignRole('editor');
        $user1->assignRole('user');
    }
}
