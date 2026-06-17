<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            ['name' => 'Administrador', 'password' => Hash::make('admin23'), 'rol' => 'admin']
        );

        User::firstOrCreate(
            ['email' => 'cliente@cliente.com'],
            ['name' => 'Cliente', 'password' => Hash::make('cliente23'), 'rol' => 'cliente']
        );
    }
}