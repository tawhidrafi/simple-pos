@extends('layouts.mainLayout')

@section('title', 'Edit Account')

@section('content')
<!-- Display Validation Errors -->
@if ($errors->any())
<x-layout.error />
@endif

<!-- Edit Form -->
<div class="bg-white shadow-md rounded-lg">
    <div class="p-6">
        <form action="{{ route('accounts.update', $account->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="account_name" class="block text-sm font-medium text-gray-700">Account Name</label>
                <input type="text" name="account_name" id="account_name" class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-lg" value="{{ old('account_name') ?? $account->account_name }}" required>
            </div>

            <div class="mb-4">
                <label for="account_number" class="block text-sm font-medium text-gray-700">Account Number</label>
                <input type="number" name="account_number" id="account_number" class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-lg" value="{{ old('account_number') ?? $account->account_number }}" required>
            </div>

            <div>
                <label for="details" class="block text-sm font-medium text-gray-700">Details</label>
                <textarea name="details" id="details" rows="2" class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-lg" value="{{ old('details') ?? $account->details }}"></textarea>
            </div>

            <div class="flex justify-end mt-8">
                <a href="{{ route('accounts.show', $account->id) }}"
                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-4">
                    Cancel
                </a>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection