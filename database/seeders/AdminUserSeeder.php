<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create an admin user
        User::create([
            'name' => 'Nandita Admin', 
            'email' => 'nandita@admin.com', 
            'password' => Hash::make('adminadmin'), 
            'role' => 'admin', 
        ]);
    }
}
