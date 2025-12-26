<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseCategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('expense_categories')->insert([
            ['name' => 'Advertisement', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Employee Salary', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Monthwise cleaning', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
