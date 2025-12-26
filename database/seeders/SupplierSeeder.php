<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('suppliers')->insert([
            [
                'name' => 'Global Traders Ltd.',
                'email' => 'contact@globaltraders.com',
                'phone' => '01920000001',
                'city' => 'Dhaka',
                'address' => 'Motijheel, Dhaka',
                'company' => 'Global Traders Ltd.',
                'tin' => 1000000001,
                'status' => 'active',
                'created_by' => 1, // Admin
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Eastern Suppliers',
                'email' => 'info@easternsuppliers.com',
                'phone' => '01920000002',
                'city' => 'Chittagong',
                'address' => 'CEPZ, Chittagong',
                'company' => 'Eastern Suppliers Co.',
                'tin' => 1000000002,
                'status' => 'active',
                'created_by' => 1, // Sales Manager
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bangla Importers',
                'email' => 'support@banglaimporters.com',
                'phone' => '01920000003',
                'city' => 'Sylhet',
                'address' => 'Amberkhana, Sylhet',
                'company' => 'Bangla Importers',
                'tin' => 1000000003,
                'status' => 'inactive',
                'created_by' => 3, // Purchase Manager
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'United Enterprises',
                'email' => 'hello@unitedenterprises.com',
                'phone' => '01920000004',
                'city' => 'Khulna',
                'address' => 'Sonadanga, Khulna',
                'company' => 'United Enterprises Ltd.',
                'tin' => 1000000004,
                'status' => 'active',
                'created_by' => 1, // HR Manager
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sunrise Suppliers',
                'email' => 'sales@sunrisesuppliers.com',
                'phone' => '01920000005',
                'city' => 'Rajshahi',
                'address' => 'Shaheb Bazar, Rajshahi',
                'company' => 'Sunrise Suppliers',
                'tin' => 1000000005,
                'status' => 'active',
                'created_by' => 3, // Support Staff
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Greenline Distributors',
                'email' => 'greenline@mail.com',
                'phone' => '01920000006',
                'city' => 'Barishal',
                'address' => 'C&B Road, Barishal',
                'company' => 'Greenline Distributors',
                'tin' => 1000000006,
                'status' => 'inactive',
                'created_by' => 3, // Accountant
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Techno Supplies',
                'email' => 'contact@technosupplies.com',
                'phone' => '01920000007',
                'city' => 'Rangpur',
                'address' => 'Modern More, Rangpur',
                'company' => 'Techno Supplies',
                'tin' => 1000000007,
                'status' => 'active',
                'created_by' => 3, // IT Manager
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Oceanic Imports',
                'email' => 'info@oceanicimports.com',
                'phone' => '01920000008',
                'city' => 'Cox’s Bazar',
                'address' => 'Laboni Beach Road, Cox’s Bazar',
                'company' => 'Oceanic Imports Ltd.',
                'tin' => 1000000008,
                'status' => 'active',
                'created_by' => 3, // Sales Manager
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Royal Suppliers',
                'email' => 'royal@mail.com',
                'phone' => '01920000009',
                'city' => 'Comilla',
                'address' => 'Kandirpar, Comilla',
                'company' => 'Royal Suppliers',
                'tin' => 1000000009,
                'status' => 'inactive',
                'created_by' => 3, // Purchase Manager
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Metro Trading',
                'email' => 'metro@mail.com',
                'phone' => '01920000010',
                'city' => 'Gazipur',
                'address' => 'Konabari, Gazipur',
                'company' => 'Metro Trading House',
                'tin' => 1000000010,
                'status' => 'active',
                'created_by' => 1, // Admin
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
