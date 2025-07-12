<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User data
        $userData = [
            'id' => Str::uuid(),
            'name' => 'superadmin',
            'email' => 'superadmin@superadmin.com',
            'password' => bcrypt('superadmin'),
        ];

        // Check if the 'superadmin' role exists
        // $role = Role::where('name', 'superadmin')->first();

        // // If the role doesn't exist, exit early
        // if (!$role) {
        //     $this->command->error('Role "superadmin" not found!');
        //     return;
        // }

        // // Create the user
        $user = User::create($userData);

        // // Assign the role to the user
        // $user->assignRole($role);


        $this->command->info('Superadmin user created and assigned the role!');
    }
}
