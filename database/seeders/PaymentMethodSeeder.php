<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('payment_methods')->insert([
            ['name' => 'Cash', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bank Transfer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Visa/Master/Amex Card', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bkash/Nagad/Upay', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
