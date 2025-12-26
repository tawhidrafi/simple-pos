<?php

namespace App\Services;

use App\Models\Product\Product;
use App\Models\Product\Variant;
use App\Models\Purchase\Purchase;
use App\Models\Purchase\PurchaseItem;
use App\Models\Purchase\PurchasePayment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PurchaseService
{
    public function createPurchaseWithItems($data)
    {
        DB::transaction(function () use ($data) {
            $purchase = $this->createPurchase($data);

            $this->createPurchasePayment($purchase, $data);

            $this->addPurchaseItems($purchase, $data['products']);
        });
    }

    private function createPurchase($data)
    {
        $due = $data['total'] - $data['paid_amount'];

        $purchase = new Purchase();
        $purchase->invoice_number = Purchase::generateInvoiceNumber();
        $purchase->supplier_id = $data['supplier_id'];
        $purchase->date = Carbon::now();
        $purchase->total = $data['total'];
        $purchase->paid_amount = $data['paid_amount'];
        $purchase->due_amount = $due;

        if ($data['total'] == $data['paid_amount']) {
            $purchase->payment_status = 'paid';
        } else {
            $purchase->payment_status = 'due';
        }
        $purchase->delivery_status = $data['delivery_status'];

        if ($due == 0 &&  $data['delivery_status'] == 'delivered') {
            $purchase->status = 'completed';
        } else {
            $purchase->status = 'pending';
        }
        $purchase->created_by = $data['created_by'];
        $purchase->save();

        return $purchase;
    }

    private function createPurchasePayment(Purchase $purchase, $data)
    {
        $purchasePayment = new PurchasePayment();
        $purchasePayment->purchase_id = $purchase->id;
        $purchasePayment->paid_amount = $data['paid_amount'];
        $purchasePayment->created_by = $data['created_by'];
        $purchasePayment->save();
    }

    private function addPurchaseItems(Purchase $purchase, array $products)
    {
        foreach ($products as $productData) {
            $product = $this->findProductOrVariant($productData['product_code']);

            if ($product) {
                $this->createPurchaseItem($purchase, $product, $productData);

                $this->updateStock($product, $productData['product_qty']);

                $this->updateProductCost($product);

                $product->calculateUnitPrice();
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

    private function createPurchaseItem(Purchase $purchase, $product, $productData)
    {
        $purchaseItem = new PurchaseItem();
        $purchaseItem->purchase_id = $purchase->id;
        if ($product instanceof Variant) {
            $purchaseItem->variant_id = $product->id;
        } else {
            $purchaseItem->product_id = $product->id;
        }
        $purchaseItem->product_code = $productData['product_code'];
        $purchaseItem->unit_cost = $productData['unit_cost'];
        $purchaseItem->product_qty = $productData['product_qty'];
        $purchaseItem->subtotal = $productData['subtotal'];
        $purchaseItem->save();
    }

    private function updateStock($product, $quantity)
    {
        $product->stock += $quantity;
        $product->save();
    }

    private function updateProductCost($product)
    {
        $purchaseItem = PurchaseItem::where('product_code', $product->code ?? $product->variant_code)
            ->whereNotNull('unit_cost')
            ->orderBy('created_at', 'asc')
            ->first();

        if ($purchaseItem) {
            $product->cost = $purchaseItem->unit_cost;
            $product->save();
        }
    }

    public function updateDeliveryStatus($id)
    {
        $purchase = Purchase::findOrfail($id);
        $purchase->delivery_status = 'delivered';
        if ($purchase->isPaid() && $purchase->isDelivered()) {
            $purchase->status = 'completed';
        }
        $purchase->save();
    }
    public function addPurchasePayment($data)
    {
        PurchasePayment::create($data);

        $purchase = Purchase::findOrfail($data['purchase_id']);
        $purchase->due_amount -= $data['paid_amount'];
        $purchase->paid_amount += $data['paid_amount'];
        if ($purchase->due_amount == 0) {
            $purchase->payment_status = 'paid';
        }
        if ($purchase->isPaid() && $purchase->isDelivered()) {
            $purchase->status = 'completed';
        }
        $purchase->save();
    }
}
