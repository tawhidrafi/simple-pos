@extends('layouts.mainLayout')

@section('content')
<div
    class="container mx-auto mt-5">
    <h1
        class="text-2xl font-bold mb-4">
        Create Product
    </h1>

    @if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li class="text-red-600">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Tabs for selecting product type -->
    <div class="tabs mb-5">
        <button
            id="standard-tab"
            class="tab-button bg-gray-200 px-4 py-2 mr-4">
            Standard Product
        </button>
        <button
            id="variable-tab"
            class="tab-button bg-gray-200 px-4 py-2">
            Variable Product
        </button>
    </div>

    <!-- Standard Product Form -->
    <div
        id="standard-product-form"
        class="product-form">
        <form
            action="{{ route('products.storeStandard') }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            <!-- Product Details -->
            <div
                class="grid grid-cols-3 gap-4">
                <div
                    class="col-span-3">
                    <label
                        for="name"
                        class="block text-gray-700">
                        Product Name
                    </label>
                    <input
                        type="text"
                        class="form-control border border-gray-300 p-2 w-full"
                        name="name"
                        required>
                </div>
                <div
                    class="col-span-3">
                    <label
                        for="code"
                        class="block text-gray-700">
                        Product Code
                    </label>
                    <input
                        type="text"
                        class="form-control border border-gray-300 p-2 w-full"
                        name="code"
                        required>
                </div>
                <div>
                    <label
                        for="category_id"
                        class="block text-gray-700">
                        Category
                    </label>
                    <select
                        name="category_id"
                        class="form-select border border-gray-300 p-2 w-full"
                        required>
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label
                        for="brand_id"
                        class="block text-gray-700">
                        Brand
                    </label>
                    <select
                        name="brand_id"
                        class="form-select border border-gray-300 p-2 w-full"
                        required>
                        <option value="">Select Brand</option>
                        @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label
                        for="unit_id"
                        class="block text-gray-700">
                        Unit
                    </label>
                    <select
                        name="unit_id"
                        class="form-select border border-gray-300 p-2 w-full"
                        required>
                        <option value="">Select Unit</option>
                        @foreach ($units as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div
                    class="col-span-3 grid grid-cols-4 gap-4">
                    <div>
                        <label
                            for="tax"
                            class="block text-gray-700">
                            Tax</label>
                        <input
                            type="number"
                            class="form-control border border-gray-300 p-2 w-full"
                            name="tax"
                            step="0.01"
                            value="0"
                            min="0">
                    </div>
                    <div>
                        <label
                            for="tax_type"
                            class="block text-gray-700">
                            Tax Type
                        </label>
                        <select
                            name="tax_type"
                            class="form-select border border-gray-300 p-2 w-full"
                            required>
                            <option value="inclusive">Inclusive</option>
                            <option value="exclusive">Exclusive</option>
                        </select>
                    </div>
                    <div>
                        <label
                            for="discount"
                            class="block text-gray-700">
                            Discount
                        </label>
                        <input
                            type="number"
                            class="form-control border border-gray-300 p-2 w-full"
                            name="discount"
                            value="0"
                            step="0.01"
                            min="0">
                    </div>
                    <div>
                        <label
                            for="commission_rate"
                            class="block text-gray-700">
                            Commission Rate
                        </label>
                        <input
                            type="number"
                            class="form-control border border-gray-300 p-2 w-full"
                            name="commission_rate"
                            value="0"
                            min="0"
                            step="0.01"
                            required>
                    </div>
                </div>
            </div>

            <input type="hidden" name="created_by" value="{{ auth()->id() }}">

            <button
                type="submit"
                class="bg-green-500 text-white px-4 py-2 mt-8">
                Create Standard Product
            </button>
        </form>
    </div>

    <!-- Variable Product Form -->
    <div id="variable-product-form" class="product-form hidden">
        <form action="{{ route('products.storeVariable') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Product Details (Shared) -->
            <div
                class="grid grid-cols-3 gap-4">
                <div
                    class="col-span-3">
                    <label
                        for="name"
                        class="block text-gray-700">
                        Product Name
                    </label>
                    <input
                        type="text"
                        class="form-control border border-gray-300 p-2 w-full"
                        name="name"
                        required>
                </div>
                <div
                    class="col-span-3">
                    <label
                        for="code"
                        class="block text-gray-700">
                        Product Code
                    </label>
                    <input
                        type="text"
                        class="form-control border border-gray-300 p-2 w-full"
                        name="code"
                        required>
                </div>
                <div>
                    <label
                        for="category_id"
                        class="block text-gray-700">
                        Category
                    </label>
                    <select
                        name="category_id"
                        class="form-select border border-gray-300 p-2 w-full"
                        required>
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label
                        for="brand_id"
                        class="block text-gray-700">
                        Brand
                    </label>
                    <select
                        name="brand_id"
                        class="form-select border border-gray-300 p-2 w-full"
                        required>
                        <option value="">Select Brand</option>
                        @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label
                        for="unit_id"
                        class="block text-gray-700">
                        Unit
                    </label>
                    <select
                        name="unit_id"
                        class="form-select border border-gray-300 p-2 w-full"
                        required>
                        <option value="">Select Unit</option>
                        @foreach ($units as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div
                    class="col-span-3 grid grid-cols-4 gap-4">
                    <div>
                        <label
                            for="tax"
                            class="block text-gray-700">
                            Tax</label>
                        <input
                            type="number"
                            class="form-control border border-gray-300 p-2 w-full"
                            name="tax"
                            step="0.01"
                            value="0"
                            min="0">
                    </div>
                    <div>
                        <label
                            for="tax_type"
                            class="block text-gray-700">
                            Tax Type
                        </label>
                        <select
                            name="tax_type"
                            class="form-select border border-gray-300 p-2 w-full"
                            required>
                            <option value="inclusive">Inclusive</option>
                            <option value="exclusive">Exclusive</option>
                        </select>
                    </div>
                    <div>
                        <label
                            for="discount"
                            class="block text-gray-700">
                            Discount
                        </label>
                        <input
                            type="number"
                            class="form-control border border-gray-300 p-2 w-full"
                            name="discount"
                            value="0"
                            step="0.01"
                            min="0">
                    </div>
                    <div>
                        <label
                            for="commission_rate"
                            class="block text-gray-700">
                            Commission Rate
                        </label>
                        <input
                            type="number"
                            class="form-control border border-gray-300 p-2 w-full"
                            name="commission_rate"
                            value="0"
                            min="0"
                            step="0.01"
                            required>
                    </div>
                </div>
            </div>

            <input type="hidden" name="created_by" value="{{ auth()->id() }}">

            <!-- Variants Section -->
            <h2
                class="text-xl font-bold my-4">
                Variants
            </h2>
            <div id="variant-container"></div>
            <button
                type="button"
                id="add-variant"
                class="bg-blue-500 text-white px-4 py-2 mt-2">
                Add Variant
            </button>
            <button
                type="submit"
                class="bg-green-500 text-white px-4 py-2 mt-4">
                Create Variable Product
            </button>
        </form>
    </div>
</div>

<script>
    document.getElementById('standard-tab').addEventListener('click', function() {
        document.getElementById('standard-product-form').classList.remove('hidden');
        document.getElementById('variable-product-form').classList.add('hidden');
    });

    document.getElementById('variable-tab').addEventListener('click', function() {
        document.getElementById('variable-product-form').classList.remove('hidden');
        document.getElementById('standard-product-form').classList.add('hidden');
    });

    let variantIndex = 0;
    document.getElementById('add-variant').addEventListener('click', function() {
        const variantTemplate = `
            <div class="grid grid-cols-2 gap-4">
                <div class="variant">
                    <label for="variant_name" class="block text-gray-700">Variant Name</label>
                    <input type="text" class="form-control border border-gray-300 p-2 w-full" name="variants[${variantIndex}][variant_name]" required>
                </div>
                <div class="variant">
                    <label for="variant_code" class="block text-gray-700">Variant Code</label>
                    <input type="text" class="form-control border border-gray-300 p-2 w-full" name="variants[${variantIndex}][variant_code]" required>
                </div>
            </div>
        `;
        document.getElementById('variant-container').insertAdjacentHTML('beforeend', variantTemplate);
        variantIndex++;
    });
</script>

@endsection