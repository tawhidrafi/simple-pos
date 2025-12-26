<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function getAllBrand()
    {
        return self::all();
    }

    public function getProducts($id)
    {
        return Product::where('brand_id', $id)
            ->with('variants')
            ->get();
    }
}
