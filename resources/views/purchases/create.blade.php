@extends('layouts.mainLayout')

@section('content')
<div class="container mx-auto mt-5">
    <h1 class="text-2xl font-bold mb-4">Create Purchase</h1>

    @if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li class="text-red-600">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('purchases.store') }}" method="POST">
        @csrf
        <!-- Supplier Selection -->
        <div class="mb-4">
            <label for="supplier_id" class="block text-gray-700">Supplier</label>
            <select name="supplier_id" class="form-select border border-gray-300 p-2 w-full" required>
                <option value="">Select Supplier</option>
                @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Products Selection -->
        <h2 class="text-xl font-bold mb-2">Products</h2>
        <div id="product-container">
            <div class="product-row grid grid-cols-6 gap-4 mb-4">
                <div class="col-span-2">
                    <label for="product_id" class="block text-gray-700">Product</label>
                    <select name="products[0][product_id]" class="form-select border border-gray-300 p-2 w-full product-select" required>
                        <option value="">Select Product</option>
                        @foreach ($products as $product)
                        <option value="{{ $product->id }}" data-code="{{ $product->code }}" data-type="standard">
                            {{ $product->name }}
                        </option>
                        @endforeach
                        @foreach ($variants as $variant)
                        <option value="{{ $variant->id }}" data-code="{{ $variant->variant_code }}" data-type="variant">
                            {{ $variant->product->name }} - {{ $variant->variant_name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-span-1">
                    <label class="block text-gray-700">Code</label>
                    <input type="text" class="form-control border border-gray-300 p-2 w-full product-code" name="products[0][product_code]" readonly>
                </div>

                <div class="col-span-1">
                    <label class="block text-gray-700">Unit Price</label>
                    <input type="number" class="form-control border border-gray-300 p-2 w-full product-unit-cost" name="products[0][unit_cost]" min="0" required>
                </div>

                <div class="col-span-1">
                    <label class="block text-gray-700">Quantity</label>
                    <input type="number" class="form-control border border-gray-300 p-2 w-full product-qty" name="products[0][product_qty]" min="0" required>
                </div>

                <div class="col-span-1">
                    <label class="block text-gray-700">Total</label>
                    <input type="number" class="form-control border border-gray-300 p-2 w-full product-subtotal" name="products[0][subtotal]" readonly>
                </div>
            </div>
        </div>

        <button type="button" class="bg-blue-500 text-white px-4 py-2 my-4" id="add-product">Add Product</button>

        <div class="grid grid-cols-3 gap-4">
            <div>
                <label for="final_total" class="block text-gray-700">Total Cost</label>
                <input type="number" id="final-total" class="form-control border border-gray-300 p-2 w-full" name="total" readonly>
            </div>
            <div>
                <label for="paid_amount" class="block text-gray-700">Paid Amount</label>
                <input type="number" id="paid_amount" class="form-control border border-gray-300 p-2 w-full" name="paid_amount">
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

        <button type="submit" class="bg-green-500 text-white px-8 py-2 mt-4">Create Purchase</button>
    </form>
</div>

<script>
    let productCount = 1;

    // Add dynamic product row
    document.getElementById('add-product').addEventListener('click', function() {
        const productContainer = document.getElementById('product-container');
        const newProductRow = document.createElement('div');
        newProductRow.classList.add('product-row', 'grid', 'grid-cols-6', 'gap-4', 'mb-4');
        newProductRow.innerHTML = `
            <div class="col-span-2">
                <select name="products[${productCount}][product_id]" class="form-select border border-gray-300 p-2 w-full product-select" required>
                    <option value="">Select Product</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" data-code="{{ $product->code }}" data-type="standard">
                            {{ $product->name }}
                        </option>
                    @endforeach
                    @foreach ($variants as $variant)
                        <option value="{{ $variant->id }}" data-code="{{ $variant->variant_code }}" data-type="variant">
                            {{ $variant->product->name }} - {{ $variant->variant_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-1">
                <input type="text" class="form-control border border-gray-300 p-2 w-full product-code" name="products[${productCount}][product_code]" readonly>
            </div>
            <div class="col-span-1">
                <input type="number" class="form-control border border-gray-300 p-2 w-full product-unit-cost" name="products[${productCount}][unit_cost]" min="0" required>
            </div>
            <div class="col-span-1">
                <input type="number" class="form-control border border-gray-300 p-2 w-full product-qty" name="products[${productCount}][product_qty]" min="0" required>
            </div>
            <div class="col-span-1">
                <input type="number" class="form-control border border-gray-300 p-2 w-full product-subtotal" name="products[${productCount}][subtotal]" readonly>
            </div>
        `;
        productContainer.appendChild(newProductRow);
        productCount++;
    });

    // Event delegation to handle product selection and auto-populate code
    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('product-select')) {
            const selectedOption = e.target.options[e.target.selectedIndex];
            const codeField = e.target.parentElement.nextElementSibling.querySelector('.product-code');
            codeField.value = selectedOption.getAttribute('data-code');
        }
    });

    // Handle auto calculation of total cost for each product and final total
    document.addEventListener('input', function(e) {
        if (e.target.classList.contains('product-unit-cost') || e.target.classList.contains('product-qty')) {
            const row = e.target.closest('.product-row');
            const unitPrice = parseFloat(row.querySelector('.product-unit-cost').value) || 0;
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