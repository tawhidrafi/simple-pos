@extends('layouts.mainLayout')

@section('title', 'Deposits')

@section('content')

<!-- Header Section with Add New Button -->
<div class="flex justify-between mb-4">
    <h2 class="text-2xl font-extrabold">Deposits</h2>
    <a href=" {{ route('deposits.create') }} ">
        <button
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Add New
        </button>
    </a>
</div>

<!-- Deposit List Table -->
<div class="bg-white shadow-md rounded-lg">
    <div class="p-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Current Deposit</h3>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-gray-600">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="py-2 px-4 text-left">Date</th>
                            <th class="py-2 px-4 text-left">Name</th>
                            <th class="py-2 px-4 text-left">Account</th>
                            <th class="py-2 px-4 text-left">Amount</th>
                            <th class="py-2 px-4 text-left">Reference</th>
                            <th class="py-2 px-4 text-left">Payment Method</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($deposits as $deposit)
                        <tr class="border-t">
                            <td class="py-2 px-4 text-left">{{ $deposit->date }}</td>
                            <td class="py-2 px-4 text-left">{{ $deposit->name }}</td>
                            <td class="py-2 px-4 text-left">{{ $deposit->account->account_name }}</td>
                            <td class="py-2 px-4 text-left">{{ $deposit->amount }}</td>
                            <td class="py-2 px-4 text-left">{{ $deposit->ref }}</td>
                            <td class="py-2 px-4 text-left">{{ $deposit->paymentMethod->name }}</td>
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

@push('scripts')
@vite(['resources/js/alert.js'])
@endpush