<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john.doe@mail.com',
                'phone' => '01910000001',
                'city' => 'Dhaka',
                'address' => 'Banani, Dhaka',
                'status' => 'active',
                'created_by' => 1, // Admin
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@mail.com',
                'phone' => '01910000002',
                'city' => 'Chittagong',
                'address' => 'Agrabad, Chittagong',
                'status' => 'active',
                'created_by' => 1, // Sales Manager
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Robert Khan',
                'email' => 'robert.khan@mail.com',
                'phone' => '01910000003',
                'city' => 'Sylhet',
                'address' => 'Zindabazar, Sylhet',
                'status' => 'inactive',
                'created_by' => 1, // Purchase Manager
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Emily Rahman',
                'email' => 'emily.rahman@mail.com',
                'phone' => '01910000004',
                'city' => 'Khulna',
                'address' => 'Boyra, Khulna',
                'status' => 'active',
                'created_by' => 2, // HR Manager
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Michael Hasan',
                'email' => 'michael.hasan@mail.com',
                'phone' => '01910000005',
                'city' => 'Rajshahi',
                'address' => 'Shaheb Bazar, Rajshahi',
                'status' => 'active',
                'created_by' => 2, // Support Staff
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sophia Akter',
                'email' => 'sophia.akter@mail.com',
                'phone' => '01910000006',
                'city' => 'Barishal',
                'address' => 'Sadar Road, Barishal',
                'status' => 'inactive',
                'created_by' => 2, // Accountant
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'David Karim',
                'email' => 'david.karim@mail.com',
                'phone' => '01910000007',
                'city' => 'Rangpur',
                'address' => 'Jahaj Company More, Rangpur',
                'status' => 'active',
                'created_by' => 2, // IT Manager
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Olivia Hossain',
                'email' => 'olivia.hossain@mail.com',
                'phone' => '01910000008',
                'city' => 'Dhaka',
                'address' => 'Dhanmondi, Dhaka',
                'status' => 'active',
                'created_by' => 2, // Sales Manager
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'William Chowdhury',
                'email' => 'william.chowdhury@mail.com',
                'phone' => '01910000009',
                'city' => 'Comilla',
                'address' => 'Kandirpar, Comilla',
                'status' => 'inactive',
                'created_by' => 2, // Purchase Manager
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ava Sultana',
                'email' => 'ava.sultana@mail.com',
                'phone' => '01910000010',
                'city' => 'Gazipur',
                'address' => 'Tongi, Gazipur',
                'status' => 'active',
                'created_by' => 1, // Admin
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
