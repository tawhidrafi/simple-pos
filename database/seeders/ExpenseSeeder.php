<?php

namespace Database\Seeders;

use App\Models\Accounting\Account;
use App\Models\Accounting\Expense;
use App\Models\Accounting\ExpenseCategory;
use App\Models\Accounting\PaymentMethod;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    public function run(): void
    {
        $accounts = Account::all();
        $expenseCategories = ExpenseCategory::all();
        $paymentMethods = PaymentMethod::all();

        foreach (range(1, 2) as $index) {
            Expense::create([
                'name' => 'Expense No ' . $index,
                'account_id' => $accounts->random()->id,
                'expense_category_id' => $expenseCategories->random()->id,
                'payment_method_id' => $paymentMethods->random()->id,
                'amount' => 0.00,
                'date' => now(),
                'ref' => '114477' . $index,
                'attachment' => NULL,
                'detail' => 'No details to be written',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
