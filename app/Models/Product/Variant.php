<?php

namespace App\Models\Product;

use App\Models\Purchase\PurchaseItem;
use App\Models\Purchase\PurchaseReturnItem;
use App\Models\Sale\SaleItem;
use App\Models\Sale\SaleReturnItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CalculatePriceTrait;

class Variant extends Model
{
    use HasFactory;
    use CalculatePriceTrait;

    protected $fillable = [
        'product_id',
        'variant_name',
        'variant_code',
        'cost',
        'price',
        'stock'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class);
    }

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function purchaseReturnItems()
    {
        return $this->hasMany(PurchaseReturnItem::class);
    }

    public function saleReturnItems()
    {
        return $this->hasMany(SaleReturnItem::class);
    }

    public static function getAllVariants()
    {
        return self::all();
    }

    public function calculateUnitPrice()
    {
        $taxType = $this->product->tax_type;
        $tax = $this->product->tax;
        $discount = $this->product->discount;
        $commissionRate = $this->product->commission_rate;

        $this->calculate($taxType, $tax, $discount, $commissionRate);
    }
}
