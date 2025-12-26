@extends('layouts.mainLayout')

@section('title', 'Roles')

@section('content')
<div class="bg-white p-8 rounded shadow-md w-full">
    <h2 class="text-2xl font-semibold mb-6">Create Role</h2>
    <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" id="role-name" placeholder="Role Name" class="w-full p-2 border border-gray-300 rounded mb-4">

        <h2 class="text-xl font-semibold mb-6">Permissions</h2>

        <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="flex items-center mb-2">
                <input type="checkbox" name="permissions[]" value="manage-brands" id="manage-brands" class="form-checkbox h-5 w-5 text-blue-600">
                <label for="manage-brands" class="ml-2">Manage Brands</label>
            </div>
            <div class="flex items-center mb-2">
                <input type="checkbox" name="permissions[]" value="manage-warehouses" id="manage-warehouses" class="form-checkbox h-5 w-5 text-blue-600">
                <label for="manage-warehouses" class="ml-2">Manage Warehouses</label>
            </div>
            <div class="flex items-center mb-2">
                <input type="checkbox" name="permissions[]" value="manage-units" id="manage-units" class="form-checkbox h-5 w-5 text-blue-600">
                <label for="manage-units" class="ml-2">Manage Units</label>
            </div>
            <div class="flex items-center mb-2">
                <input type="checkbox" name="permissions[]" value="manage-product-categories" id="manage-product-categories" class="form-checkbox h-5 w-5 text-blue-600">
                <label for="manage-product-categories" class="ml-2">Manage Product Categories</label>
            </div>
            <div class="flex items-center mb-2">
                <input type="checkbox" name="permissions[]" value="manage-products" id="manage-products" class="form-checkbox h-5 w-5 text-blue-600">
                <label for="manage-products" class="ml-2">Manage Products</label>
            </div>
            <div class="flex items-center mb-2">
                <input type="checkbox" name="permissions[]" value="manage-suppliers" id="manage-suppliers" class="form-checkbox h-5 w-5 text-blue-600">
                <label for="manage-suppliers" class="ml-2">Manage Suppliers</label>
            </div>
            <div class="flex items-center mb-2">
                <input type="checkbox" name="permissions[]" value="manage-customers" id="manage-customers" class="form-checkbox h-5 w-5 text-blue-600">
                <label for="manage-customers" class="ml-2">Manage Customers</label>
            </div>
            <div class="flex items-center mb-2">
                <input type="checkbox" name="permissions[]" value="manage-expense-categories" id="manage-expense-categories" class="form-checkbox h-5 w-5 text-blue-600">
                <label for="manage-expense-categories" class="ml-2">Manage Expense Categories</label>
            </div>
            <div class="flex items-center mb-2">
                <input type="checkbox" name="permissions[]" value="manage-expenses" id="manage-expenses" class="form-checkbox h-5 w-5 text-blue-600">
                <label for="manage-expenses" class="ml-2">Manage Expenses</label>
            </div>
            <div class="flex items-center mb-2">
                <input type="checkbox" name="permissions[]" value="manage-purchase" id="manage-purchase" class="form-checkbox h-5 w-5 text-blue-600">
                <label for="manage-purchase" class="ml-2">Manage Purchases</label>
            </div>
            <div class="flex items-center mb-2">
                <input type="checkbox" name="permissions[]" value="manage-sale" id="manage-sale" class="form-checkbox h-5 w-5 text-blue-600">
                <label for="manage-sale" class="ml-2">Manage Sales</label>
            </div>
            <div class="flex items-center mb-2">
                <input type="checkbox" name="permissions[]" value="manage-purchase-return" id="manage-purchase-return" class="form-checkbox h-5 w-5 text-blue-600">
                <label for="manage-purchase-return" class="ml-2">Manage Purchase Returns</label>
            </div>
            <div class="flex items-center mb-2">
                <input type="checkbox" name="permissions[]" value="manage-sale-return" id="manage-sale-return" class="form-checkbox h-5 w-5 text-blue-600">
                <label for="manage-sale-return" class="ml-2">Manage Sale Returns</label>
            </div>
            <div class="flex items-center mb-2">
                <input type="checkbox" name="permissions[]" value="manage-transfers" id="manage-transfers" class="form-checkbox h-5 w-5 text-blue-600">
                <label for="manage-transfers" class="ml-2">Manage Transfers</label>
            </div>
            <div class="flex items-center mb-2">
                <input type="checkbox" name="permissions[]" value="manage-adjustments" id="manage-adjustments" class="form-checkbox h-5 w-5 text-blue-600">
                <label for="manage-adjustments" class="ml-2">Manage Adjustments</label>
            </div>
            <div class="flex items-center mb-2">
                <input type="checkbox" name="permissions[]" value="manage-variations" id="manage-variations" class="form-checkbox h-5 w-5 text-blue-600">
                <label for="manage-variations" class="ml-2">Manage Variations</label>
            </div>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-16 py-4 rounded hover:bg-blue-700">Create Role</button>
    </form>
</div>

<script>
    const checkboxes = document.querySelectorAll('.form-checkbox');
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', () => {
            if (checkbox.checked) {
                checkbox.classList.add('bg-blue-600');
            } else {
                checkbox.classList.remove('bg-blue-600');
            }
        });
    });
</script>
@endsection