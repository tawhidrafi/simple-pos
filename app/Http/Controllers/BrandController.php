<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('Product.Brand.index', compact('brands'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:100'
        ]);
        $supplier = Brand::create($validatedData);
        return redirect()->back()->with('success', 'Brand added successfully!');
    }
    public function editView($id)
    {

    }
    public function update($id, Request $request)
    {

    }
    public function delete($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('Brand.index')->with('success', 'Brand deleted successfully.');
    }
}
