<?php

namespace App\Models\Purchase;

use App\Models\Product\Product;
use App\Models\Product\Variant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;

    protected  $fillable = [
        'purchase_id',
        'product_id',
        'variant_id',
        'product_code',
        'unit_cost',
        'product_qty',
        'subtotal',
    ];

    public function purchases()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class, 'variant_id');
    }
}
