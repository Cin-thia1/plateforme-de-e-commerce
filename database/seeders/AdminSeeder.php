<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'ruhtra',
            'firstname' => '',
            'email' => 'admin@123.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'), // Laravel génère le hash
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        echo "Admin créé avec succès!\n";
        echo "Email: admin@123.com\n";
        echo "Mot de passe: admin123\n";
    }
}