<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleTableSeeder::class,
            PermissionsTableSeeder::class,
            UsersTableSeeder::class,
            //
            CustomerSeeder::class,
            SupplierSeeder::class,
            //
            CategorySeeder::class,
            BrandSeeder::class,
            UnitSeeder::class,
            ProductSeeder::class,
            //
            AccountSeeder::class,
            PaymentMethodSeeder::class,
            ExpenseCategorySeeder::class,
            DepositSeeder::class,
            ExpenseSeeder::class,
        ]);
    }
}
