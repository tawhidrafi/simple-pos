<?php

namespace App\Models\Purchase;

use App\Models\Product\Product;
use App\Models\Product\Variant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseReturnItem extends Model
{
    use HasFactory;

    protected  $fillable = [
        'purchase_return_id',
        'product_id',
        'variant_id',
        'product_code',
        'unit_cost',
        'product_qty',
        'subtotal',
    ];

    public function purchaseReturn()
    {
        return $this->belongsTo(PurchaseReturn::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }
}
