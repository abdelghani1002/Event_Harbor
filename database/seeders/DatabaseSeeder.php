<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $admin = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        $organizer = \App\Models\User::factory()->create([
            'name' => 'Organizer',
            'email' => 'organizer@organizer.com',
            'password' => Hash::make('password'),
        ]);

        $admin_role = Role::create(['name' => 'admin']);
        $organizer_role = Role::create(['name' => 'organizer']);

        $create_event = Permission::create(['name' => 'create event']);
        $book_event = Permission::create(['name' => 'book event']);
        
        $organizer_role->givePermissionTo($create_event);
        $organizer_role->givePermissionTo($book_event);

        $organizer->assignRole($organizer_role);
        $admin->assignRole($admin_role);
    }
}
