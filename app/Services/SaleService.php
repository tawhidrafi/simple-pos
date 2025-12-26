<?php

namespace App\Services;

use App\Models\Product\Product;
use App\Models\Product\Variant;
use App\Models\Sale\Sale;
use App\Models\Sale\SaleItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SaleService
{
    // create new sale
    public function createSaleWithItems($data)
    {
        DB::transaction(function () use ($data) {
            $sale = $this->createSale($data);

            $this->addSaleItems($sale, $data['products']);
        });
    }

    // sale table
    private function createSale($data)
    {
        $sale = new Sale();
        $sale->invoice_number = Sale::generateInvoiceNumber();
        $sale->customer_id = $data['customer_id'];
        $sale->date = Carbon::now();
        $sale->total = $data['total'];

        if ($data['delivery_status'] == 'delivered') {
            $sale->status = 'completed';
        } else {
            $sale->status = 'pending';
        }
        $sale->created_by = $data['created_by'];
        $sale->save();

        return $sale;
    }

    // sale items and stock
    private function addSaleItems(Sale $sale, array $products)
    {
        foreach ($products as $productData) {
            $product = $this->findProductOrVariant($productData['product_code']);

            if ($product) {
                $this->createSaleItem($sale, $product, $productData);

                $this->updateStock($product, $productData['product_qty']);
            }
        }
    }

    // select product
    private function findProductOrVariant($productCode)
    {
        $product = Product::where('code', $productCode)->first();

        if ($product) {
            return $product;
        }

        return Variant::where('variant_code', $productCode)->first();
    }

    // sale item table
    private function createSaleItem(Sale $sale, $product, $productData)
    {
        $saleItem = new SaleItem();
        $saleItem->sale_id = $sale->id;
        if ($product instanceof Variant) {
            $saleItem->variant_id = $product->id;
        } else {
            $saleItem->product_id = $product->id;
        }
        $saleItem->product_code = $productData['product_code'];
        $saleItem->unit_price = $productData['unit_price'];
        $saleItem->product_qty = $productData['product_qty'];
        $saleItem->subtotal = $productData['subtotal'];
        $saleItem->save();
    }

    // stock update
    private function updateStock($product, $quantity)
    {
        $product->stock -= $quantity;
        $product->save();
    }

    // update status
    public function updateDeliveryStatus($id)
    {
        $sale = Sale::findOrfail($id);
        $sale->delivery_status = 'delivered';
        $sale->status = 'completed';
        $sale->save();
    }
}
