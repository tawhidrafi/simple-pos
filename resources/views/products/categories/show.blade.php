@extends('layouts.mainLayout')

@section('title', 'Categories - Products')

@section('content')
<!-- Product list Table -->
<div class="bg-white shadow-md rounded-lg mb-8">
    <div class="p-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Products</h3>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-gray-600">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="py-2 px-4 text-left">Product Name</th>
                            <th class="py-2 px-4 text-left">Brand</th>
                            <th class="py-2 px-4 text-left">Cost</th>
                            <th class="py-2 px-4 text-left">Price</th>
                            <th class="py-2 px-4 text-left">Stock</th>
                            <th class="py-2 px-4 text-left">Type</th>
                            <th class="py-2 px-4 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr class="border-t">
                            <td class="py-2 px-4 text-left">{{ $product->name }}</td>
                            <td class="py-2 px-4 text-left">{{ $product->brand->name }}</td>
                            <td class="py-2 px-4 text-left">{{ $product->cost }}</td>
                            <td class="py-2 px-4 text-left">{{ $product->price }}</td>
                            <td class="py-2 px-4 text-left">{{ $product->stock }}</td>
                            <td class="py-2 px-4 text-left">
                                {{ $product->is_variable ? 'Variable' : 'Standard' }}
                            </td>
                            <td class="py-2 px-4 text-left">
                                <a href="{{ route('products.show', $product->id) }}" class="text-blue-600 hover:underline">See Product</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="py-2 px-4 text-center">No data available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection