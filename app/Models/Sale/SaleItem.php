<?php

namespace App\Models\Sale;

use App\Models\Product\Product;
use App\Models\Product\Variant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected  $fillable = [
        'sale_id',
        'product_id',
        'variant_id',
        'product_code',
        'unit_price',
        'product_qty',
        'subtotal',
    ];

    public function sales()
    {
        return $this->belongsTo(Sale::class);
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
