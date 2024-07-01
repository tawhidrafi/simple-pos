<?php

namespace App\Http\Controllers;

use App\Models\VariantAttribute;
use Illuminate\Http\Request;

class VariantAttribiuteController extends Controller
{
    public function index()
    {
        $attributes = VariantAttribute::all();
        return view('Product.VariantAttribute.index', compact('attributes'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:100'
        ]);
        $attribute = VariantAttribute::create($validatedData);
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
        $attribute = VariantAttribute::findOrFail($id);
        $attribute->delete();
        return redirect()->route('VariantAttribiute.index')->with('success', 'Attribute deleted successfully.');
    }
}
