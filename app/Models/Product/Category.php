<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function getAllCategory()
    {
        return self::all();
    }

    public function getProducts($id)
    {
        return Product::where('category_id', $id)
            ->with('variants')
            ->get();
    }
}
