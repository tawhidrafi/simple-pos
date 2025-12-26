@extends('layouts.mainLayout')

@section('title', 'Account')

@section('content')

<!-- Account Info -->
<div class="bg-white shadow-md rounded-lg mb-8">
    <div class="p-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Account Info</h3>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-gray-600">
                    <tbody>
                        <tr class="border-t">
                            <td class="py-4 px-4 text-left">Account Name : {{ $account->account_name }}</td>
                            <td class="py-4 px-4 text-left">Account Number : {{ $account->account_number }}</td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-4 px-4 text-left">Balance : {{ $account->balance }}</td>
                            <td class="py-4 px-4 text-left">Created : {{ \Carbon\Carbon::parse($account->created_at)->format('Y-m-d') }}</td>
                        </tr>
                        <tr class="border-t">
                            <td class="px-4 py-4">
                                Action
                                <a
                                    type="button"
                                    href="{{ route('accounts.index') }}"
                                    class="text-blue-700 hover:text-white border-2 border-blue-700 hover:bg-blue-800 focus:outline-none font-medium rounded-lg text-sm px-2.5 py-1 text-center mx-4">
                                    Back
                                </a>
                                <a
                                    type="button"
                                    href="{{ route('accounts.edit', $account->id) }}"
                                    class="text-green-700 hover:text-white border-2 border-green-700 hover:bg-green-800 focus:outline-none font-medium rounded-lg text-sm px-2.5 py-1 text-center mx-4">
                                    Edit
                                </a>
                                <form
                                    action="{{ route('accounts.destroy', $account->id) }}"
                                    method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="text-red-700 hover:text-white border-2 border-red-700 hover:bg-red-800 focus:outline-none font-medium rounded-lg text-sm px-2.5 py-1 text-center mx-4">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Deposit list Table -->
<div class="bg-white shadow-md rounded-lg mb-8">
    <div class="p-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Deposits</h3>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-gray-600">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="py-2 px-4 text-left">Date</th>
                            <th class="py-2 px-4 text-left">Name</th>
                            <th class="py-2 px-4 text-left">Amount</th>
                            <th class="py-2 px-4 text-left">Reference No</th>
                            <th class="py-2 px-4 text-left">Payment Method</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($account->deposits as $deposit)
                        <tr class="border-t">
                            <td class="py-2 px-4 text-left">
                                {{ \Carbon\Carbon::parse($deposit->date)->format('Y-m-d') }}
                            </td>
                            <td class="py-2 px-4 text-left">{{ $deposit->name }}</td>
                            <td class="py-2 px-4 text-left">{{ $deposit->amount }}</td>
                            <td class="py-2 px-4 text-left">{{ $deposit->ref }}</td>
                            <td class="py-2 px-4 text-left">{{ $deposit->paymentMethod->name}}</td>
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
<!-- Expense list Table -->
<div class="bg-white shadow-md rounded-lg mb-8">
    <div class="p-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Expenses</h3>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-gray-600">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="py-2 px-4 text-left">Date</th>
                            <th class="py-2 px-4 text-left">Name</th>
                            <th class="py-2 px-4 text-left">Expense Category</th>
                            <th class="py-2 px-4 text-left">Amount</th>
                            <th class="py-2 px-4 text-left">Reference No</th>
                            <th class="py-2 px-4 text-left">Payment Method</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($account->expenses as $expense)
                        <tr class="border-t">
                            <td class="py-2 px-4 text-left">
                                {{ \Carbon\Carbon::parse($expense->date)->format('Y-m-d') }}
                            </td>
                            <td class="py-2 px-4 text-left">{{ $expense->name }}</td>
                            <td class="py-2 px-4 text-left">{{ $expense->expenseCategory->name }}</td>
                            <td class="py-2 px-4 text-left">{{ $expense->amount }}</td>
                            <td class="py-2 px-4 text-left">{{ $expense->ref }}</td>
                            <td class="py-2 px-4 text-left">{{ $expense->paymentMethod->name}}</td>
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