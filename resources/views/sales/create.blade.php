@extends('layouts.mainLayout')

@section('content')
<div class="container mx-auto mt-5">
    <h1 class="text-2xl font-bold mb-4">Create Sales</h1>

    @if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li class="text-red-600">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('sales.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Customer Selection -->
        <div class="mb-4">
            <label for="customer_id" class="block text-gray-700">Customers</label>
            <select name="customer_id" class="form-select border border-gray-300 p-2 w-full" required>
                <option value="">Select Customer</option>
                @foreach ($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Products Selection -->
        <h2 class="text-xl font-bold mb-2">Products</h2>
        <div id="product-container">
            <div class="product-row flex mb-4">
                <div class="w-2/5 pr-2">
                    <label for="product_id" class="block text-gray-700">Product</label>
                    <select name="products[0][product_id]" class="form-select border border-gray-300 p-2 w-full product-select" required>
                        <option value="">Select Product</option>
                        @foreach ($products as $product)
                        <option value="{{ $product->id }}" data-code="{{ $product->code }}" data-unit-price="{{ $product->price }}" data-type="standard">
                            {{ $product->name }}
                        </option>
                        @endforeach
                        @foreach ($variants as $variant)
                        <option value="{{ $variant->id }}" data-code="{{ $variant->variant_code }}" data-unit-price="{{ $variant->price }}" data-type="variant">
                            {{ $variant->product->name }} - {{ $variant->variant_name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="w-1/5 pr-2">
                    <label class="block text-gray-700">Code</label>
                    <input type="text" class="form-control border border-gray-300 p-2 w-full product-code" name="products[0][product_code]" readonly>
                </div>

                <div class="w-1/5 pr-2">
                    <label class="block text-gray-700">Unit Price</label>
                    <input type="number" class="form-control border border-gray-300 p-2 w-full product-unit-price" name="products[0][unit_price]" min="0" required readonly>
                </div>

                <div class="w-1/5 pr-2">
                    <label class="block text-gray-700">Quantity</label>
                    <input type="number" class="form-control border border-gray-300 p-2 w-full product-qty" name="products[0][product_qty]" min="0" required>
                </div>

                <div class="w-1/5">
                    <label class="block text-gray-700">Total</label>
                    <input type="number" class="form-control border border-gray-300 p-2 w-full product-subtotal" name="products[0][subtotal]" readonly>
                </div>
            </div>
        </div>

        <button type="button" class="bg-blue-500 text-white px-4 py-2 mb-4" id="add-product">Add Product</button>

        <!-- Status Selections -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="final_total" class="block text-gray-700">Total Cost</label>
                <input type="number" id="final-total" class="form-control border border-gray-300 p-2 w-full" name="total" readonly>
            </div>
            <!-- Status Selections -->
            <div>
                <label for="delivery_status" class="block text-gray-700">Delivery Status</label>
                <select name="delivery_status" class="form-select border border-gray-300 p-2 w-full" required>
                    <option value="pending">Pending</option>
                    <option value="delivered">Delivered</option>
                </select>
            </div>
        </div>

        <input type="hidden" name="created_by" value="{{ auth()->id() }}">

        <button type="submit" class="bg-green-500 text-white px-4 py-2 mt-4">Create Sale</button>
    </form>
</div>

<script>
    let productCount = 1;

    // Add dynamic product row
    document.getElementById('add-product').addEventListener('click', function() {
        const productContainer = document.getElementById('product-container');
        const newProductRow = document.createElement('div');
        newProductRow.classList.add('product-row', 'flex', 'mb-4');
        newProductRow.innerHTML = `
            <div class="w-2/5 pr-2">
                <select name="products[${productCount}][product_id]" class="form-select border border-gray-300 p-2 w-full product-select" required>
                    <option value="">Select Product</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" data-code="{{ $product->code }}" data-unit-price="{{ $product->price }}" data-type="standard">
                            {{ $product->name }}
                        </option>
                    @endforeach
                    @foreach ($variants as $variant)
                        <option value="{{ $variant->id }}" data-code="{{ $variant->variant_code }}" data-unit-price="{{ $variant->price }}" data-type="variant">
                            {{ $variant->product->name }} - {{ $variant->variant_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="w-1/5 pr-2">
                <input type="text" class="form-control border border-gray-300 p-2 w-full product-code" name="products[${productCount}][product_code]" readonly>
            </div>
            <div class="w-1/5 pr-2">
                <input type="number" class="form-control border border-gray-300 p-2 w-full product-unit-price" name="products[${productCount}][unit_price]" min="0" required readonly>
            </div>
            <div class="w-1/5 pr-2">
                <input type="number" class="form-control border border-gray-300 p-2 w-full product-qty" name="products[${productCount}][product_qty]" min="0" required>
            </div>
            <div class="w-1/5">
                <input type="number" class="form-control border border-gray-300 p-2 w-full product-subtotal" name="products[${productCount}][subtotal]" readonly>
            </div>
        `;
        productContainer.appendChild(newProductRow);
        productCount++;
    });

    // Event delegation to handle product selection and auto-populate code and unit price
    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('product-select')) {
            const selectedOption = e.target.options[e.target.selectedIndex];
            const codeField = e.target.parentElement.nextElementSibling.querySelector('.product-code');
            codeField.value = selectedOption.getAttribute('data-code');

            // Set the unit price based on the selected product
            const unitPriceField = e.target.parentElement.nextElementSibling.nextElementSibling.querySelector('.product-unit-price');
            unitPriceField.value = selectedOption.getAttribute('data-unit-price');
        }
    });

    // Handle auto calculation of total cost for each product and final total
    document.addEventListener('input', function(e) {
        if (e.target.classList.contains('product-unit-price') || e.target.classList.contains('product-qty')) {
            const row = e.target.closest('.product-row');
            const unitPrice = parseFloat(row.querySelector('.product-unit-price').value) || 0;
            const qty = parseFloat(row.querySelector('.product-qty').value) || 0;
            const total = unitPrice * qty;
            row.querySelector('.product-subtotal').value = total.toFixed(2);

            // Update final total
            let finalTotal = 0;
            document.querySelectorAll('.product-subtotal').forEach(item => {
                finalTotal += parseFloat(item.value) || 0;
            });
            document.getElementById('final-total').value = finalTotal.toFixed(2);
        }
    });
</script>
@endsection