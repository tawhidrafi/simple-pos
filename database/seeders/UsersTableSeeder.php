<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'phone' => '01211111111',
                'address' => 'No address needed',
                'password' => Hash::make('123456789'),
                'role_id' => 1,
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sales Manager',
                'email' => 'sales@mail.com',
                'phone' => '01322222222',
                'address' => 'No address needed',
                'password' => Hash::make('987654321'),
                'role_id' => 2,
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Purchase Manager',
                'email' => 'purchase@mail.com',
                'phone' => '01433333333',
                'address' => 'No address needed',
                'password' => Hash::make('147258369'),
                'role_id' => 3,
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HR Manager',
                'email' => 'hr@mail.com',
                'phone' => '01544444444',
                'address' => 'Head Office',
                'password' => Hash::make('111111111'),
                'photo' => null,
                'role_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Support Staff',
                'email' => 'support@mail.com',
                'phone' => '01655555555',
                'address' => 'Support Desk',
                'password' => Hash::make('222222222'),
                'photo' => null,
                'role_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Accountant',
                'email' => 'account@mail.com',
                'phone' => '01766666666',
                'address' => 'Finance Department',
                'password' => Hash::make('333333333'),
                'photo' => null,
                'role_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'IT Manager',
                'email' => 'it@mail.com',
                'phone' => '01877777777',
                'address' => 'Server Room',
                'password' => Hash::make('444444444'),
                'photo' => null,
                'role_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
