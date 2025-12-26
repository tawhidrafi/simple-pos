@extends('layouts.mainLayout')

@section('title', 'Accounts')

@section('content')
<!-- Display Validation Errors -->
@if ($errors->any())
<x-layout.error />
@endif

<!-- Header Section with Add New Button -->
<div class="flex justify-between mb-4">
    <h2 class="text-2xl font-extrabold">Accounts</h2>

    <button
        data-modal-toggle="addAccountModal"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        Add New
    </button>
</div>

<!-- Account List Table -->
<div class="bg-white shadow-md rounded-lg">
    <div class="p-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Account List</h3>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-gray-600">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="py-2 px-4 text-left">Account Name</th>
                            <th class="py-2 px-4 text-left">Account Number</th>
                            <th class="py-2 px-4 text-left">Balance</th>
                            <th class="py-2 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($accounts as $account)
                        <tr class="border-t">
                            <td class="py-2 px-4 text-left">{{ $account->account_name }}</td>
                            <td class="py-2 px-4 text-left">{{ $account->account_number }}</td>
                            <td class="py-2 px-4 text-left">{{ $account->balance }}</td>
                            <td class="py-2 px-4 text-right">
                                <a
                                    href="{{ route('accounts.show', $account->id) }}"
                                    class="text-blue-500 hover:underline">
                                    <button class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">
                                        View
                                    </button>
                                </a>
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

<!-- Modal for Adding New Account -->
@section('modal')
<div
    id="addAccountModal"
    tabindex="-1"
    aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex justify-center items-center p-4 min-h-screen bg-gray-900 bg-opacity-50">
    <div class="relative w-full h-auto max-w-2xl">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal Header -->
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="text-xl font-semibold text-gray-900">Add New Account</h3>
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
                    action="{{ route('accounts.store') }}"
                    method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="account_name" class="block text-sm font-medium text-gray-700">Account Name</label>
                        <input type="text" name="account_name" id="account_name" class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-lg" required>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="account_number" class="block text-sm font-medium text-gray-700">Account Number</label>
                            <input type="number" name="account_number" id="account_number" class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-lg" required>
                        </div>

                        <div>
                            <label for="balance" class="block text-sm font-medium text-gray-700">Balance</label>
                            <input type="number" name="balance" id="balance" class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-lg" min="0.00" step="0.01" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="details" class="block text-sm font-medium text-gray-700">Details</label>
                        <textarea name="details" id="details" rows="2" class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-lg"></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">Add</button>
                    </div>
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