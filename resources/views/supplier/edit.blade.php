@extends('layouts.mainLayout')

@section('title', 'Edit Supplier')

@section('content')
<!-- Display Validation Errors -->
@if ($errors->any())
<x-layout.error />
@endif

<!-- Edit Form -->
<div class="bg-white shadow-md rounded-lg">
    <div class="p-6">
        <form
            enctype="multipart/form-data"
            action="{{ route('suppliers.update', $supplier->id) }}"
            method="POST">
            @csrf
            @method('PUT')

            <div
                class="grid gap-4 sm:grid-cols-3 sm:gap-6">
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
                        value="{{ old('name') ?? $supplier->name }}"
                        required>
                </div>
                <div>
                    <label
                        for="email"
                        class="block mb-2 text-sm font-medium text-gray-900">
                        Email Address
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        value="{{ old('email') ?? $supplier->email }}"
                        required>
                </div>
                <div>
                    <label
                        for="phone"
                        class="block mb-2 text-sm font-medium text-gray-900">
                        Phone Number
                    </label>
                    <input
                        type="text"
                        name="phone"
                        id="phone"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        value="{{ old('phone') ?? $supplier->phone }}"
                        required>
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
                        value="{{ old('city') ?? $supplier->city }}"
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
                        value="{{ old('address') ?? $supplier->address }}">
                </div>
                <div>
                    <label
                        for="company"
                        class="block mb-2 text-sm font-medium text-gray-900">
                        Company / Business
                    </label>
                    <input
                        type="text"
                        name="company"
                        id="company"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        value="{{ old('company') ?? $supplier->company }}"
                        required>
                </div>
                <div>
                    <label
                        for="tin"
                        class="block mb-2 text-sm font-medium text-gray-900">
                        TIN Number
                    </label>
                    <input
                        type="text"
                        name="tin"
                        id="tin"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        value="{{ old('tin') ?? $supplier->tin }}">
                </div>
            </div>
            <div class="flex justify-end">
                <a href="{{ route('suppliers.show', $supplier->id) }}"
                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-4 mt-6">
                    Cancel
                </a>
                <x-button.primary-button label="Update" />
            </div>
        </form>
    </div>
</div>
@endsection