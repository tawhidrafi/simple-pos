<?php

namespace App\Models\Product;

use App\Models\Purchase\PurchaseItem;
use App\Models\Purchase\PurchaseReturnItem;
use App\Models\Sale\SaleItem;
use App\Models\Sale\SaleReturnItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CalculatePriceTrait;

class Product extends Model
{
    use HasFactory;
    use CalculatePriceTrait;

    protected $fillable = [
        'name',
        'brand_id',
        'category_id',
        'unit_id',
        'code',
        'is_variable',
        'commission_rate',
        'discount',
        'tax_type',
        'tax',
        'cost',
        'price',
        'stock',
        'created_by'
    ];

    protected $casts = [
        'tax' => 'float',
        'discount' => 'float',
        'commission_rate' => 'float',
        'cost' => 'float',
        'price' => 'float',
        'stock' => 'integer',
        'is_variable' => 'boolean',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function isVariable()
    {
        return $this->variants()->exists();
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class);
    }

    public function purchaseReturnItems()
    {
        return $this->hasMany(PurchaseReturnItem::class);
    }

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function saleReturnItems()
    {
        return $this->hasMany(SaleReturnItem::class);
    }

    public static function getAllNonVariableProducts()
    {
        return self::where('is_variable', false)->get();
    }

    public static function getAllWithVariants($id)
    {
        return self::with('variants')->find($id);
    }

    public function calculateUnitPrice()
    {
        $this->calculate(
            $this->tax_type,
            $this->tax,
            $this->discount,
            $this->comiisision_rate
        );
    }
}
