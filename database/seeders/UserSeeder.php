<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'password' => 'Adm1ni$Tr4d0R'
        ])->assignRole('admin');

        User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@email.com',
            'email_verified_at' => now(),
            'password' => 'Ed1T0r12345'
        ])->assignRole('editor');
    }
}
