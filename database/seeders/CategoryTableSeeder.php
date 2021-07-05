<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('categories')->insert([
            'description' => 'Admin'
       ]);
       DB::table('categories')->insert([
            'description' => 'Gerente'
       ]);
       DB::table('categories')->insert([
            'description' => 'Normal'
       ]);
    }
}
