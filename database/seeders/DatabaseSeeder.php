<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name'=>'resepsionis',
            'username'=>'admin',
            'password'=>Hash::make('resepsionis123'),//resepsionis123
            'role'=>'resepsionis',
            'email'=>'resepsionis@gmail.com',
            'email_verified_at'=>now()
        ]);

        \App\Models\User::create([
            'name'=>'admin',
            'username'=>'admin',
            'password'=>Hash::make('admin123'),
            'role'=>'admin',
            'email'=>'admin@gmail.com',
            'email_verified_at'=>now()
        ]);

        \App\Models\User::create([
            'name'=>'tamu',
            'username'=>'tamu',
            'password'=>Hash::make('tamu123'),
            'role'=>'tamu',
            'email'=>'tamu@gmail.com',
            'email_verified_at'=>now()
        ]);
    }
}
