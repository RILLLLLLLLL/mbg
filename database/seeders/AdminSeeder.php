<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            [
                'email' => 'admin@mbg.com'
            ],
            [
                'name' => 'Admin MBG',
                'password' => Hash::make('password'),
            ]
        );

        $admin->assignRole('Admin');
    }
}