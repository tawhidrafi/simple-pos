<?php

namespace App\Http\Controllers;

use App\Models\VariantAttribute;
use Illuminate\Http\Request;

class VariantAttribiuteController extends Controller
{
    public function index()
    {
        $attributes = VariantAttribute::all();

        // Pass data to the view and return it
        return view('Product.VariantAttribute.index', compact('attributes'));
    }
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:100'
        ]);

        // If validation passes, create a new supplier
        $attribute = VariantAttribute::create([
            'title' => $validatedData['title'],
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Attribute added successfully!');
    }
    public function editView($id)
    {

    }
    public function update($id, Request $request)
    {

    }
    public function delete($id)
    {
        $attribute = VariantAttribute::findOrFail($id); // Find supplier by ID

        $attribute->delete(); // Delete the supplier

        return redirect()->route('VariantAttribiute.index')->with('success', 'Attribute deleted successfully.');
    }
}
