<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreStandardProductRequest;
use App\Http\Requests\Product\StoreVariableProductRequest;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\Product\Unit;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $service)
    {
        $this->productService = $service;
    }
    // index page
    public function index()
    {
        $products = Product::with('category', 'brand', 'unit', 'variants')->get();

        return view('products.products.index', compact('products'));
    }
    // create page
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $units = Unit::all();

        return view('products.products.create', compact('brands', 'categories', 'units'));
    }
    // create standard product
    public function storeStandard(StoreStandardProductRequest $request)
    {
        $validated = $request->validated();

        $this->productService->createStandardProduct($validated);

        return redirect()->route('products.index')->with('success', 'Standard product created successfully.');
    }
    // create variable product
    public function storeVariable(StoreVariableProductRequest $request)
    {
        $validated = $request->validated();

        $this->productService->createVariableProduct($validated);

        return redirect()->route('products.index')->with('success', 'Variable product created successfully.');
    }
    // show single product
    public function show(Product $product)
    {
        $product->load('variants');

        return view('products.products.show', compact('product'));
    }
}
