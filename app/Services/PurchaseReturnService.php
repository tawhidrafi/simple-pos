<?php

namespace App\Services;

use App\Models\Product\Product;
use App\Models\Product\Variant;
use App\Models\Purchase\PurchaseReturn;
use App\Models\Purchase\PurchaseReturnItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PurchaseReturnService
{
    public function createPurchaseReturnWithItems($data)
    {
        DB::transaction(function () use ($data) {
            $purchaseReturn = $this->createPurchaseReturn($data);

            $this->addPurchaseReturnItems($purchaseReturn, $data['products']);
        });
    }

    private function createPurchaseReturn($data)
    {
        $purchaseReturn = new PurchaseReturn();
        $purchaseReturn->purchase_id = $data['purchase_id'];
        $purchaseReturn->invoice_number = PurchaseReturn::generateInvoiceNumber();
        $purchaseReturn->date = Carbon::now();
        $purchaseReturn->total = $data['total'];
        $purchaseReturn->status = $data['status'];
        $purchaseReturn->created_by = $data['created_by'];
        $purchaseReturn->save();

        return $purchaseReturn;
    }

    private function addPurchaseReturnItems(PurchaseReturn $purchaseReturn, array $products)
    {
        foreach ($products as $productData) {
            $product = $this->findProductOrVariant($productData['product_code']);

            if ($product) {
                $this->createPurchaseReturnItem($purchaseReturn, $product, $productData);
            }
        }
    }

    private function findProductOrVariant($productCode)
    {
        $product = Product::where('code', $productCode)->first();

        if ($product) {
            return $product;
        }

        return Variant::where('variant_code', $productCode)->first();
    }

    private function createPurchaseReturnItem(PurchaseReturn $purchaseReturn, $product, $productData)
    {
        $purchaseReturnItem = new PurchaseReturnItem();
        $purchaseReturnItem->purchase_return_id = $purchaseReturn->id;
        if ($product instanceof Variant) {
            $purchaseReturnItem->variant_id = $product->id;
        } else {
            $purchaseReturnItem->product_id = $product->id;
        }
        $purchaseReturnItem->product_code = $productData['product_code'];
        $purchaseReturnItem->unit_cost = $productData['unit_cost'];
        $purchaseReturnItem->product_qty = $productData['product_qty'];
        $purchaseReturnItem->subtotal = $productData['subtotal'];
        $purchaseReturnItem->save();
    }
}
