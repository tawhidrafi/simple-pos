<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('units')->insert([
            ['name' => 'Piece', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Meter', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Liter', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Box', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
