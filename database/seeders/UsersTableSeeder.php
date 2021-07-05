<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jorge da Silva',
            'email' => 'jorge@terra.com.br',
            'email_verified_at' => now(),
            'password' => Hash::make('@athena01'), // password
            'remember_token' => Str::random(10),
            'category_id' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'Flavia Monteiro',
            'email' => 'flavia@globo.com',
            'email_verified_at' => now(),
            'password' => Hash::make('@athena02'), // password
            'remember_token' => Str::random(10),
            'category_id' => 2
            ]);
        DB::table('users')->insert([
            'name' => 'Marcos Frota Ribeiro',
            'email' => 'ribeiro@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('@athena03'), // password
            'remember_token' => Str::random(10),
            'category_id' => 2
            ]);
        DB::table('users')->insert([
            'name' => 'Raphael Souza Santos',
            'email' => 'rsantos@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('@athena04'), // password
            'remember_token' => Str::random(10),
            'category_id' => 1
            ]);
        DB::table('users')->insert([
            'name' => 'Pedro Paulo Mota',
            'email' => 'ppmota@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('@athena05'), // password
            'remember_token' => Str::random(10),
            'category_id' => 1
            ]);
        DB::table('users')->insert([
            'name' => 'Winder Carvalho da Silva',
            'email' => 'winder@hotmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('@athena06'), // password
            'remember_token' => Str::random(10),
            'category_id' => 3
            ]);
        DB::table('users')->insert([
            'name' => 'Maria da Penha Albuquerque',
            'email' => 'mpa@hotmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('@athena07'), // password
            'remember_token' => Str::random(10),
            'category_id' => 3
            ]);
        DB::table('users')->insert([
            'name' => 'Rafael Garcia Souza',
            'email' => 'rgsouza@hotmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('@athena08'), // password
            'remember_token' => Str::random(10),
            'category_id' => 3
            ]);
        DB::table('users')->insert([
            'name' => 'Tabata Costa',
            'email' => 'tabata_costa@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('@athena09'), // password
            'remember_token' => Str::random(10),
            'category_id' => 2
            ]);
        DB::table('users')->insert([
            'name' => 'Ronil Camarote',
            'email' => 'camarote@terra.com.br',
            'email_verified_at' => now(),
            'password' => Hash::make('@athena10'), // password
            'remember_token' => Str::random(10),
            'category_id' => 1
            ]);
        DB::table('users')->insert([
            'name' => 'Joaquim Barbosa',
            'email' => 'barbosa@globo.com',
            'email_verified_at' => now(),
            'password' => Hash::make('@athena11'), // password
            'remember_token' => Str::random(10),
            'category_id' => 1
            ]);
        DB::table('users')->insert([
            'name' => 'Eveline Maria Alcantra',
            'email' => 'ev_alcantra@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('@athena12'), // password
            'remember_token' => Str::random(10),
            'category_id' => 2
            ]);
        DB::table('users')->insert([
            'name' => 'João Paulo Vieira',
            'email' => 'jpvieria@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('@athena13'), // password
            'remember_token' => Str::random(10),
            'category_id' => 1
            ]);
        DB::table('users')->insert([
            'name' => 'Carla Zamborlini',
            'email' => 'zamborlini@terra.com.br',
            'email_verified_at' => now(),
            'password' => Hash::make('@athena14'), // password
            'remember_token' => Str::random(10),
            'category_id' => 3
            ]);
    }
}
