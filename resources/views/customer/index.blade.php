@extends('layouts.mainLayout')

@section('title', 'Customers')

@section('content')
<!-- Display Validation Errors -->
@if ($errors->any())
<x-layout.error />
@endif

<!-- Header Section with Add New Button -->
<div class="flex justify-between mb-4">
    <h2 class="text-2xl font-extrabold">Customers</h2>

    <button
        data-modal-toggle="addAccountModal"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        Add New
    </button>
</div>

<!-- customer List Table -->
<div class="bg-white shadow-md rounded-lg">
    <div class="p-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Customer List</h3>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-gray-600">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="py-2 px-4 text-left">Name</th>
                            <th class="py-2 px-4 text-left">Email</th>
                            <th class="py-2 px-4 text-left">Phone</th>
                            <th class="py-2 px-4 text-left">Total Sale</th>
                            <th class="py-2 px-4 text-left">Amount</th>
                            <th class="py-2 px-4 text-left">Status</th>
                            <th class="py-2 px-4 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customers as $customer)
                        <tr class="border-t">
                            <td class="py-2 px-4 text-left">{{ $customer->name }}</td>
                            <td class="py-2 px-4 text-left">{{ $customer->email }}</td>
                            <td class="py-2 px-4 text-left">{{ $customer->phone }}</td>
                            <td class="py-2 px-4 text-left">{{ $customer->totalSales() }}</td>
                            <td class="py-2 px-4 text-left">{{ $customer->totalSaleAmount() }}</td>
                            <td class="py-2 px-4 text-left">{{ $customer->status }}</td>
                            <td class="py-2 px-4 text-right">
                                <a
                                    href="{{ route('customers.show', $customer->id) }}" type="button" class="text-sm font-medium text-blue-500">
                                    View</a>
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

<!-- Modal for Adding New Supplier -->
@section('modal')
<div
    id="addAccountModal"
    tabindex="-1"
    aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex justify-center items-center p-4 min-h-screen bg-gray-900 bg-opacity-50">
    <div class="relative w-full h-auto max-w-5xl">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal Header -->
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="text-xl font-semibold text-gray-900">Add New Customer</h3>
                <button
                    type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-toggle="addAccountModal">
                    <span class="sr-only">Close</span>
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="p-6 space-y-6">
                <form
                    enctype="multipart/form-data"
                    action="{{ route('customers.store') }}"
                    method="POST">
                    @csrf

                    <div
                        class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                        <div>
                            <label
                                for="name"
                                class="block mb-2 text-sm font-medium text-gray-900">
                                Name<span class="text-red-600">*</span>
                            </label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="John Doe"
                                required>
                        </div>
                        <div>
                            <label
                                for="email"
                                class="block mb-2 text-sm font-medium text-gray-900">
                                Email Address<span class="text-red-600">*</span>
                            </label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="yourmail@mail.com"
                                required>
                        </div>
                        <div>
                            <label
                                for="phone"
                                class="block mb-2 text-sm font-medium text-gray-900">
                                Phone Number<span class="text-red-600">*</span>
                            </label>
                            <input
                                type="text"
                                name="phone"
                                id="phone"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="01234-112233"
                                required>
                        </div>
                        <div>
                            <label
                                for="city"
                                class="block mb-2 text-sm font-medium text-gray-900">
                                City<span class="text-red-600">*</span>
                            </label>
                            <input
                                type="text"
                                name="city"
                                id="city"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Dhaka"
                                required>
                        </div>
                        <div>
                            <label
                                for="address"
                                class="block mb-2 text-sm font-medium text-gray-900">
                                Address
                            </label>
                            <input
                                type="text"
                                name="address"
                                id="address"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="221/B, Baker street">
                        </div>

                        <input type="hidden" name="created_by" value="{{ auth()->id() }}">

                    </div>
                    <x-button.primary-button label="Add" />
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Modal toggle script
    document.querySelectorAll('[data-modal-toggle]').forEach(button => {
        button.addEventListener('click', () => {
            const modalId = button.getAttribute('data-modal-toggle');
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        });
    });
</script>
@vite(['resources/js/alert.js'])
@endpush