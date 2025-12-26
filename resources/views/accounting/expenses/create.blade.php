@extends('layouts.mainLayout')

@section('title', 'Add Expense')

@section('content')
<!-- Display Validation Errors -->
@if ($errors->any())
<x-layout.error />
@endif

<!-- Create Form -->
<div class="bg-white shadow-md rounded-lg mb-8">
    <div class="p-6">
        <form action=" {{ route('expenses.store') }} " enctype="multipart/form-data" method="POST">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type name" required="">
                </div>
                <div>
                    <label for="ref" class="block mb-2 text-sm font-medium text-gray-900">Reference No</label>
                    <input type="number" name="ref" id="ref" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Enter reference Number" required="">
                </div>
                <div>
                    <label for="account_id" class="block mb-2 text-sm font-medium text-gray-900">Account</label>
                    <select id="account_id" name="account_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                        <option selected="">Select account</option>
                        @foreach ($accounts as $account)
                        <option value="{{ $account->id }}">{{ $account->account_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="expense_category_id" class="block mb-2 text-sm font-medium text-gray-900">Expense Category</label>
                    <select id="expense_category_id" name="expense_category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                        <option selected="">Select account</option>
                        @foreach ($expenseCategories as $expenseCategory)
                        <option value="{{ $expenseCategory->id }}">{{ $expenseCategory->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="payment_method_id" class="block mb-2 text-sm font-medium text-gray-900">Payment Method</label>
                    <select id="payment_method_id" name="payment_method_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                        <option selected="">Select payment method</option>
                        @foreach ($paymentMethods as $paymentMethod)
                        <option value="{{ $paymentMethod->id }}">{{ $paymentMethod->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="amount" class="block mb-2 text-sm font-medium text-gray-900">Amount</label>
                    <input type="number" name="amount" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="$256" required="">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="attachment">Upload attachment</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none" id="attachment" name="attachment" type="file">
                </div>
                <div>
                    <label for="detail" class="block mb-2 text-sm font-medium text-gray-900">Detail</label>
                    <textarea id="detail" name="detail" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Your detail here"></textarea>
                </div>
            </div>

            <div class="flex justify-end mt-8">
                <a href="{{ route('expenses.index') }}"
                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-4">
                    Back
                </a>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">Add</button>
            </div>
        </form>
    </div>
</div>
@endsection