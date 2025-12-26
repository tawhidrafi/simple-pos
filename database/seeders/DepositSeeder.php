<?php

namespace Database\Seeders;

use App\Models\Accounting\Account;
use App\Models\Accounting\Deposit;
use App\Models\Accounting\PaymentMethod;
use Illuminate\Database\Seeder;

class DepositSeeder extends Seeder
{
    public function run(): void
    {
        $accounts = Account::all();
        $paymentMethods = PaymentMethod::all();

        foreach (range(1, 2) as $index) {
            Deposit::create([
                'name' => 'Deposit No ' . $index,
                'account_id' => $accounts->random()->id,
                'payment_method_id' => $paymentMethods->random()->id,
                'amount' => 0.00,
                'date' => now(),
                'ref' => '998877' . $index,
                'attachment' => NULL,
                'detail' => 'No details to be written',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
