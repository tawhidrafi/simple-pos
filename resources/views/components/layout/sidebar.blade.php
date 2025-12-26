<div id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-gray-800 text-white p-6 transform -translate-x-full transition-transform duration-300 z-20">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">Menu</h2>
        <button id="close-sidebar" class="text-white focus:outline-none">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <nav>
        <a href="{{ route('dashboard') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Dashboard</a>

        <!-- USER & ROLES Dropdown -->
        @if(auth()->user()->hasRole('admin'))
        <div>
            <button class="flex justify-between w-full py-2 px-4 text-left hover:bg-gray-700 rounded" id="users-dropdown" aria-expanded="false">
                User Management
                <i class="fa-solid fa-caret-down"></i>
            </button>
            <div id="users-menu" class="pl-6 hidden">
                <a href="/users" class="block py-2 px-4 hover:bg-gray-700 rounded">Users</a>
                <a href="{{ route('roles.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Roles</a>
            </div>
        </div>
        @endif
        <!-- Contact Dropdown -->
        <div>
            <button class="flex justify-between w-full py-2 px-4 text-left hover:bg-gray-700 rounded" id="contact-dropdown" aria-expanded="false">
                Contact
                <i class="fa-solid fa-caret-down"></i>
            </button>
            <div id="contact-menu" class="pl-6 hidden">
                <a href="{{ route('customers.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Customers</a>
                <a href="{{ route('suppliers.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Suppliers</a>
            </div>
        </div>

        <!-- Product Dropdown -->
        <div>
            <button class="flex justify-between w-full py-2 px-4 text-left hover:bg-gray-700 rounded" id="product-dropdown" aria-expanded="false">
                Product
                <i class="fa-solid fa-caret-down"></i>
            </button>
            <div id="product-menu" class="pl-6 hidden">
                <a href="{{ route('products.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">All Products</a>
                <a href="{{ route('brands.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Brand</a>
                <a href="{{ route('categories.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Category</a>
                <a href="{{ route('units.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Unit</a>
                <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Adjustment</a>
                <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Price Management</a>
            </div>
        </div>

        <!-- PURCHASE Dropdown -->
        @if(auth()->user()->hasAnyRole(['admin', 'purchase-manager']))
        <div>
            <button class="flex justify-between w-full py-2 px-4 text-left hover:bg-gray-700 rounded" id="purchase-dropdown" aria-expanded="false">
                Purchases
                <i class="fa-solid fa-caret-down"></i>
            </button>
            <div id="purchase-menu" class="pl-6 hidden">
                <a href="{{ route('purchases.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">All Purchase</a>
                <a href="{{ route('purchase-returns.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Purchase Returns</a>
            </div>
        </div>
        @endif

        <!-- SALE Dropdown -->
        @if(auth()->user()->hasAnyRole(['admin', 'sales-manager']))
        <div>
            <button class="flex justify-between w-full py-2 px-4 text-left hover:bg-gray-700 rounded" id="sale-dropdown" aria-expanded="false">
                Sales
                <i class="fa-solid fa-caret-down"></i>
            </button>
            <div id="sale-menu" class="pl-6 hidden">
                <a href="{{ route('sales.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">All Sales</a>
                <a href="{{ route('sale-returns.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Sale Returns</a>
            </div>
        </div>
        @endif

        <!-- Accounting Dropdown -->
        @if(auth()->user()->hasRole('admin'))
        <div>
            <button class="flex justify-between w-full py-2 px-4 text-left hover:bg-gray-700 rounded" id="accounting-dropdown" aria-expanded="false">
                Accounting
                <i class="fa-solid fa-caret-down"></i>
            </button>
            <div id="accounting-menu" class="pl-6 hidden">
                <a href="{{ route('accounts.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Account</a>
                <a href="{{ route('deposits.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Deposit</a>
                <a href="{{ route('expenses.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Expense</a>
                <a href="{{ route('expense-categories.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Expense Categories</a>
                <a href="{{ route('payment-methods.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded">Payment Methods</a>
            </div>
        </div>
        @endif
    </nav>
</div>