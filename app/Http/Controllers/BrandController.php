<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    //
    public function index()
    {
        $brands = Brand::all();

        // Pass data to the view and return it
        return view('Product.Brand.index', compact('brands'));
    }
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:100'
        ]);

        // If validation passes, create a new supplier
        $supplier = Brand::create([
            'title' => $validatedData['title'],
        ]);

        // Redirect back with success message
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
        $brand = Brand::findOrFail($id); // Find supplier by ID

        $brand->delete(); // Delete the supplier

        return redirect()->route('Brand.index')->with('success', 'Brand deleted successfully.');
    }
}
