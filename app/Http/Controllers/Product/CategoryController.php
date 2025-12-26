<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // index, create, edit page
    public function index()
    {
        $categories =  Category::all();

        return view('products.categories.index', compact('categories'));
    }
    // create new
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string',
        ]);

        Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }
    // show category wise products
    public function show(Category $category)
    {
        $category->load('products');

        return view('products.categories.show', compact('category'));
    }
    // update category
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'string'
        ]);

        $category->update($validated);

        return redirect()->back()->with('success', 'Category updated successfully');
    }
    // delete category
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}
