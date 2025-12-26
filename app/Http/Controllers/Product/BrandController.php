<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BrandController extends Controller
{
    // index, create, edit page
    public function index()
    {
        $brands = Brand::all();

        return view('products.brands.index', compact('brands'));
    }
    // create new brand
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string',
        ]);

        Brand::create($validated);

        return redirect()->back()->with('success', 'Brand created successfully');
    }
    // show single brand with product
    public function show(Brand $brand)
    {
        $brand->load('products');

        return view('products.brands.show', compact('brand'));
    }
    // update
    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'name' => 'string'
        ]);

        $brand->update($validated);

        return redirect()->back()->with('success', 'Brand updated successfully');
    }
    // delete 
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->back()->with('success', 'Brand deleted successfully');
    }
}
