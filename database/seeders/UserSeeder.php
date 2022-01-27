<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'role' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(60)
        ]);
        DB::table('users')->insert([
            'username' => 'user',
            'role' => 'user',
            'email' => 'user@mail.com',
            'password' => Hash::make('user'),
            'remember_token' => Str::random(60)
        ]);
        DB::table('profile')->insert([
            'user_id' => 1,
            'nama' => 'Mas Admin',
            'alamat' => 'Jl. Mas Admin',
            'bio'=> 'Mas Admin Mau Bertanya',
        ]);
        DB::table('profile')->insert([
            'user_id' => 2,
            'nama' => 'Mas User',
            'alamat' => 'Jl. Mas User',
            'bio'=> 'Mas User Mau Bertanya',
        ]);
    }
}
