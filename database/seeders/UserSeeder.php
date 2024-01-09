<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Enums\BlogEnums;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Seed one admin
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => BlogEnums::ADMIN,
        ]);

        // Seed one writer
        DB::table('users')->insert([
            'name' => 'Writer User',
            'email' => 'writer@example.com',
            'password' => Hash::make('password'),
            'role' => BlogEnums::WRITER,
        ]);
    }
}

