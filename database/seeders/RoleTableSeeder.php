<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'sales-manager', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'purchase-manager', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
