<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PenulisSeeder extends Seeder
{
    public function run(): void
    {
        $penulis = [
            ['name' => 'Budi Santoso',  'email' => 'budi@mbg.com'],
            ['name' => 'Siti Rahayu',   'email' => 'siti@mbg.com'],
            ['name' => 'Andi Wijaya',   'email' => 'andi@mbg.com'],
        ];

        foreach ($penulis as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name'     => $data['name'],
                    'password' => Hash::make('password'),
                ]
            );
            $user->assignRole('Penulis');
        }
    }
}
