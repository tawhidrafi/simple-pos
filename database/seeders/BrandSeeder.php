<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('brands')->insert([
            ['name' => 'Nike', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Adidas', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Samsung', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Apple', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sony', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
