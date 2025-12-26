<?php

namespace App\Services;

use App\Models\Product\Product;
use App\Models\Product\Variant;
use Illuminate\Support\Facades\DB;

class ProductService
{
    //
    private function addCommonData($data)
    {
        $product = new Product();

        $product->name = $data['name'];
        $product->category_id = $data['category_id'];
        $product->brand_id = $data['brand_id'];
        $product->unit_id = $data['unit_id'];
        $product->tax = $data['tax'];
        $product->tax_type = $data['tax_type'];
        $product->discount = $data['discount'];
        $product->code = $data['code'];
        $product->commission_rate = $data['commission_rate'];
        $product->created_by = $data['created_by'];

        $product->save();

        return $product;
    }
    //
    private function addVariantData($variant, $product)
    {
        $variant = new Variant();

        $variant->product_id = $product->id;
        $variant->variant_name = $variant['variant_name'];
        $variant->variant_code = $variant['variant_code'];

        $variant->save();
    }
    //
    public function createStandardProduct($data)
    {
        $this->addCommonData($data);
    }
    //
    public function createVariableProduct($data)
    {
        DB::transaction(function () use ($data) {
            $product = $this->addCommonData($data);

            $product->is_variable = true;
            $product->save();

            $variantArray = $data['variants'];
            foreach ($variantArray as $variant) {
                $this->addVariantData($variant, $product);
            }
        });
    }
}
