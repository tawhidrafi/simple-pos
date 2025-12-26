<?php

namespace Database\Seeders;

use App\Models\Admin\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'manage-product-attributes',
            'manage-products',
            'manage-accounts',
            'manage-suppliers',
            'manage-customers',
            'manage-accounts',
            'view-suppliers',
            'view-customers',
            'manage-purchase',
            'manage-purchase-return',
            'manage-sale',
            'manage-sale-return',
            'manage-transfers',
            'manage-warehouses',
            'manage-adjustments'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
