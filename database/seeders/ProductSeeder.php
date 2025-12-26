<?php

namespace Database\Seeders;

use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\Product\Unit;
use App\Models\Product\Variant;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $units = Unit::all();
        $users = User::all();

        foreach (range(1, 3) as $index) {
            Product::create([
                'name' => 'Standard Product ' . $index,
                'category_id' => $categories->random()->id,
                'brand_id' => $brands->random()->id,
                'unit_id' => $units->random()->id,
                'code' => 'STDPROD' . $index,
                'tax' => 5.00,
                'tax_type' => 'inclusive', // or 'inclusive'
                'discount' => 0.00,
                'commission_rate' => 10.00,
                'cost' => 0.00,
                'price' => 0.00,
                'stock' => 0,
                'is_variable' => false,
                'created_by' => $users->random()->id,
            ]);
        }

        foreach (range(4, 6) as $index) {
            $product = Product::create([
                'name' => 'Variants for ' . $index,
                'category_id' => $categories->random()->id,
                'brand_id' => $brands->random()->id,
                'unit_id' => $units->random()->id,
                'code' => 'VARPROD' . $index,
                'tax' => 10.00,
                'tax_type' => 'exclusive',
                'discount' => 0.00,
                'commission_rate' => 10.00,
                'cost' => 0.00,
                'price' => 0.00,
                'stock' => 0,
                'is_variable' => true,
                'created_by' => $users->random()->id,
            ]);

            foreach (range(1, 2) as $variantIndex) {
                Variant::create([
                    'product_id' => $product->id,
                    'variant_name' => 'Variant ' . $variantIndex . ' for ' . $product->name,
                    'variant_code' => 'VAR' . $product->id . '-' . $variantIndex,
                    'cost' => 0.00,
                    'price' => 0.00,
                    'stock' => 0,
                ]);
            }
        }
    }
}
