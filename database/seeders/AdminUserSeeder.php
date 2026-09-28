<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@ncekjoetie.com'],
            [
                'name' => 'Admin Ncek Joe Tie',
                'password' => Hash::make('12345678'),
                'role' => 'super_admin',
                'email_verified_at' => now(),
            ]
        );

        User::updateOrCreate(
            ['email' => 'staff@ncekjoetie.com'],
            [
                'name' => 'Staff Ncek Joe Tie',
                'password' => Hash::make('87654321'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );
    }
}