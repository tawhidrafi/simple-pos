@extends('layouts.mainLayout')

@section('title', 'Customers')

@section('content')
<!-- Display Validation Errors -->
@if ($errors->any())
<x-layout.error />
@endif

<!-- customer List Table -->
<div class="bg-white shadow-md rounded-lg">
    <div class="p-6">
        <form action=" {{ route('customers.update', $customer->id) }} " method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid sm:grid-cols-2 gap-4">
                <div>
                    <label
                        for="name"
                        class="block mb-2 text-sm font-medium text-gray-900">
                        Name
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        value="{{ old('name', $customer->name) }}">
                </div>
                <div>
                    <label
                        for="email"
                        class="block mb-2 text-sm font-medium text-gray-900">
                        Email
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        value="{{ old('email', $customer->email) }}">
                </div>
                <div>
                    <label
                        for="phone"
                        class="block mb-2 text-sm font-medium text-gray-900">
                        Phone
                    </label>
                    <input
                        type="tel"
                        name="phone"
                        id="phone"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        value="{{ old('phone', $customer->phone) }}">
                </div>
                <div>
                    <label
                        for="city"
                        class="block mb-2 text-sm font-medium text-gray-900">
                        City
                    </label>
                    <input
                        type="text"
                        name="city"
                        id="city"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        value="{{ old('city', $customer->city) }}">
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
                        value="{{ old('address', $customer->address) }}">
                </div>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 mt-4">update</button>
        </form>
    </div>
</div>
@endsection