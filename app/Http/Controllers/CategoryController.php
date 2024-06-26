<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        // Pass data to the view and return it
        return view('Product.Category.index', compact('categories'));
    }
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:100'
        ]);

        // If validation passes, create a new supplier
        $categories = Category::create([
            'title' => $validatedData['title'],
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Category added successfully!');
    }
    public function editView($id)
    {

    }
    public function update($id, Request $request)
    {

    }
    public function delete($id)
    {
        $category = Category::findOrFail($id); // Find supplier by ID

        $category->delete(); // Delete the supplier

        return redirect()->route('Category.index')->with('success', 'Category deleted successfully.');
    }
}
