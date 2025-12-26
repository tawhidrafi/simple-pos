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

    <form action="{{ route('purchases.pay') }}" method="POST">
        @csrf

        <div>
            <label for="" class="block mb-2 text-sm font-medium text-gray-900">Purchase Invoice No</label>
            <select id="" name="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                <option value="">{{ $purchase->invoice_number }}</option>
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

        <div class="grid grid-cols-3 gap-4">
            <div>
                <label for="paid_amount" class="block text-gray-700">Paid Amount</label>
                <input type="number" id="paid_amount" class="form-control border border-gray-300 p-2 w-full" name="paid_amount" max="{{ $purchase->due_amount }}">
            </div>
        </div>

        <input type="hidden" name="purchase_id" value="{{ $purchase->id }}">

        <input type="hidden" name="created_by" value="{{ auth()->id() }}">

        <button type="submit" class="bg-green-500 text-white px-8 py-2 mt-4">Add Payment</button>
    </form>
</div>

@endsection