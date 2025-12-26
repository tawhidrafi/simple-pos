<?php

namespace App\Services;

use App\Models\Product\Product;
use App\Models\Product\Variant;
use App\Models\Sale\SaleReturn;
use App\Models\Sale\SaleReturnItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SaleReturnService
{
    public function createSaleReturnWithItems($data)
    {
        DB::transaction(function () use ($data) {
            $saleReturn = $this->createSaleReturn($data);

            $this->addSaleReturnItems($saleReturn, $data['products']);
        });
    }

    private function createSaleReturn($data)
    {
        $saleReturn = new SaleReturn();
        $saleReturn->sale_id = $data['sale_id'];
        $saleReturn->invoice_number = SaleReturn::generateInvoiceNumber();
        $saleReturn->date = Carbon::now();
        $saleReturn->total = $data['total'];
        $saleReturn->status = $data['status'];
        $saleReturn->created_by = $data['created_by'];
        $saleReturn->save();

        return $saleReturn;
    }

    private function addSaleReturnItems(SaleReturn $saleReturn, array $products)
    {
        foreach ($products as $productData) {
            $product = $this->findProductOrVariant($productData['product_code']);

            if ($product) {
                $this->createSaleReturnItem($saleReturn, $product, $productData);
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

    private function createSaleReturnItem(SaleReturn $saleReturn, $product, $productData)
    {
        $saleReturnItem = new SaleReturnItem();
        $saleReturnItem->sale_return_id = $saleReturn->id;
        if ($product instanceof Variant) {
            $saleReturnItem->variant_id = $product->id;
        } else {
            $saleReturnItem->product_id = $product->id;
        }
        $saleReturnItem->product_code = $productData['product_code'];
        $saleReturnItem->unit_price = $productData['unit_price'];
        $saleReturnItem->product_qty = $productData['product_qty'];
        $saleReturnItem->subtotal = $productData['subtotal'];
        $saleReturnItem->save();
    }

    // update status
    public function updateDeliveryStatus($id)
    {
        $return = SaleReturn::findOrfail($id);
        $return->status = 'completed';
        $return->save();
    }
}
