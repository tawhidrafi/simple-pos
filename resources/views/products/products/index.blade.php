@extends('layouts.mainLayout')

@section('content')

<!-- create & search -->
<div class="flex items-center justify-between mb-8">
    <input
        type="text"
        placeholder="Search"
        class="border border-gray-300 rounded-md p-2 w-full max-w-xs" />
    <button class="bg-blue-500 text-white px-4 py-2 rounded-md ml-2">
        Create Product
    </button>
</div>

<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200 rounded-md">
        <thead>
            <tr class="bg-gray-100">
                <!-- <th class="text-left p-4">Image</th> -->
                <th class="text-left p-4">Name</th>
                <th class="text-left p-4">Code</th>
                <th class="text-left p-4">Brand</th>
                <th class="text-left p-4">Category</th>
                <th class="text-left p-4">Type</th>
                <th class="text-left p-4">Created at</th>
                <th class="text-left p-4">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr class="border-t border-gray-200">
                <!-- <td class="p-4">
                            <img
                                src="https://via.placeholder.com/40"
                                alt="Product Image"
                                class="rounded-full" />
                        </td> -->
                <td class="p-4">{{ $product->name }}</td>
                <td class="p-4 text-red-500">{{ $product->code }}</td>
                <td class="p-4">{{ $product->brand->name }}</td>
                <td class="p-4">{{ $product->category->name }}</td>
                <td class="p-4">{{ $product->is_variable ? 'Variable' : 'Standard' }}</td>
                <td class="p-4">{{ $product->created_at }}</td>
                <td class="p-4 text-blue-500">
                    <a href="{{ route('products.show', $product->id) }}" class="text-blue-600 hover:underline">
                        View
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10" class="text-center py-4">No products available.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- pagination -->
<div class="flex items-center justify-end mt-4">
    <div class="flex items-center">
        <button class="border border-gray-300 text-gray-600 px-2 py-1 rounded-md">
            &lt;
        </button>
        <button class="border border-gray-300 text-gray-600 px-2 py-1 rounded-md ml-2">
            &gt;
        </button>
    </div>
</div>
@endsection