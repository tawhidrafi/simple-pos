<?php

namespace Database\Seeders;

use App\Models\Accounting\Account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    public function run(): void
    {
        foreach (range(1, 2) as $index) {
            Account::create([
                'account_name' => 'Account 1' . $index,
                'account_number' => '124455' . $index,
                'balance' => 0.00,
                'details' => 'No details to be written',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
