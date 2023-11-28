<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        \App\Models\User::create([
            'name'=>'admin',
            'username'=>'admin',
            'password'=>'$2y$10$KHOT48LRGRNe2Sp01JHffOszE5VN8.JN5.SMfCGpFJHg.hwEz.jU6',//admin123
            'role'=>'admin',
            'email'=>'admin@gmail.com',
            'email_verified_at'=>now()
        ]);

        \App\Models\User::create([
            'name'=>'tamu',
            'username'=>'tamu',
            'password'=>'$2y$10$KHOT48LRGRNe2Sp01JHffOszE5VN8.JN5.SMfCGpFJHg.hwEz.jU6',//admin123
            'role'=>'tamu',
            'email'=>'tamu@gmail.com',
            'email_verified_at'=>now()
        ]);

        \App\Models\User::create([
            'name'=>'resepsionis',
            'username'=>'resepsionis',
            'password'=>'$2y$10$KHOT48LRGRNe2Sp01JHffOszE5VN8.JN5.SMfCGpFJHg.hwEz.jU6',//admin123
            'role'=>'resepsionis',
            'email'=>'resepsionis@gmail.com',
            'email_verified_at'=>now()
        ]);
    }
}
