<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'brand', 'group', 'unit'])->get();
        return view('Product.Inventory.index', compact('products'));
    }
}