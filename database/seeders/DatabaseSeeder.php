<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
        ]);

        DB::table('permissions')->insert([
            ['name' => 'Add User', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'View User', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'Edit User', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'Delete User', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'View Role', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'Add Project', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'View Project', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'Edit Project', 'guard_name' => 'web', 'created_at' => now()],
            ['name' => 'Delete Project', 'guard_name' => 'web', 'created_at' => now()],
        ]);
        // Create owner Role
        $admin = Role::create([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);

        $permissions = Permission::all();
        $admin->syncPermissions($permissions);

        // Create Manager Role
        $manager = Role::create([
            'name' => 'Manager',
            'guard_name' => 'web',
        ]);

        $manager->givePermissionTo(['Add Project', 'View Project', 'Edit Project', 'Delete Project', 'View Role']);

        //Create Developer Role
        $developer = Role::create([
            'name' => 'Developer',
            'guard_name' => 'web',
        ]);

        $developer->givePermissionTo(['View Project', 'Edit Project', 'View Role']);

        //Create Viewer Role
        $viewer = Role::create([
            'name' => 'Viewer',
            'guard_name' => 'web',
        ]);

        $viewer->givePermissionTo(['View Project', 'View Role']);

        $user->assignRole('Admin');
    }
}
