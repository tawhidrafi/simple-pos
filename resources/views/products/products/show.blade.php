<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Product Details</title>
</head>

<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-lg font-semibold text-gray-700">Product Details</h1>
            <a href="/products">
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Back</button>
            </a>
        </div>
        <!-- Product Info -->
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div>
                <p class="text-sm text-gray-500">Product Name</p>
                <p class="text-gray-700 font-medium">{{ $product->name }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Product Code</p>
                <p class="text-gray-700 font-medium">{{ $product->code }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Product Type</p>
                <p class="text-gray-700 font-medium">{{ $product->is_variable ? 'Variable' : 'Standard' }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Category</p>
                <p class="text-gray-700 font-medium">{{ $product->category->name }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Brand</p>
                <p class="text-gray-700 font-medium">{{ $product->brand->name }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Unit</p>
                <p class="bg-green-100 text-green-600 px-2 py-1 rounded text-sm inline-block">{{ $product->unit->name }}</p>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-4 mb-4">
            <div>
                <p class="text-sm text-gray-500">Tax Type</p>
                <p class="text-gray-700 font-medium">{{ $product->tax_type }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Tax</p>
                <p class="bg-green-100 text-green-600 px-2 py-1 rounded text-sm inline-block">{{ $product->tax }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Discount</p>
                <p class="text-gray-700 font-medium">{{ $product->discount }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Commission Rate</p>
                <p class="bg-green-100 text-green-600 px-2 py-1 rounded text-sm inline-block">{{ $product->commission_rate }}</p>
            </div>
        </div>
        @if (!$product->is_variable)
        <h1 class="text-lg font-semibold text-gray-700">Stock</h1>
        <div class="grid grid-cols-3 gap-4 mb-2">
            <div>
                <p class="text-sm text-gray-500">Product Cost</p>
                <p class="text-gray-700 font-medium">{{ $product->cost }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Product Price</p>
                <p class="bg-green-100 text-green-600 px-2 py-1 rounded text-sm inline-block">{{ $product->price }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Stock</p>
                <p class="text-gray-700 font-medium">{{ $product->stock }}</p>
            </div>
        </div>
        @endif

        <!-- Product Image 
        <div class="my-6 flex items-center justify-center relative">
            <button class="absolute left-0 bg-gray-200 p-2 rounded-full hover:bg-gray-300">&larr;</button>
            <img src="https://via.placeholder.com/500" alt="Pizza" class="w-64 h-64 object-cover rounded">
            <button class="absolute right-0 bg-gray-200 p-2 rounded-full hover:bg-gray-300">&rarr;</button>
        </div> -->

        <!-- Variations Table -->
        @if (!$product->variants->isEmpty())
        <div class="my-8">
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Variations</h2>
            </div>
            <table class="w-full border-collapse bg-white rounded-md shadow-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-left text-gray-600">Name</th>
                        <th class="px-4 py-2 text-left text-gray-600">Code</th>
                        <th class="px-4 py-2 text-left text-gray-600">Cost</th>
                        <th class="px-4 py-2 text-left text-gray-600">Price</th>
                        <th class="px-4 py-2 text-left text-gray-600">Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product->variants as $variant)
                    <tr class="border-t">
                        <td class="px-4 py-2 text-gray-700">{{ $variant->variant_name }}</td>
                        <td class="px-4 py-2 text-gray-700">{{ $variant->variant_code }}</td>
                        <td class="px-4 py-2 text-gray-700">{{ $variant->cost }}</td>
                        <td class="px-4 py-2 text-gray-700">{{ $variant->price }}</td>
                        <td class="px-4 py-2 text-gray-700">{{ $variant->stock }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</body>

</html>