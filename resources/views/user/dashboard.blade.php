@extends('layouts.mainLayout')

@section('title', 'Dashboard - POS')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen">
    <!-- Dashboard Title -->
    <div class="mb-6">
        <h2 class="text-3xl font-semibold text-gray-800">Dashboard</h2>
    </div>

    <!-- Cards Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        @if(auth()->user()->hasAnyRole(['admin', 'sales-manager'])) <!-- For Admin and Sales Manager -->
        <!-- Total Sales Card -->
        <div class="bg-white p-6 rounded-lg shadow-lg flex justify-between items-center">
            <div class="flex items-center">
                <span class="text-2xl font-bold text-blue-500">Total Sales</span>
            </div>
            <div class="text-right">
                <span class="text-3xl font-semibold text-gray-800">{{ $totalSales }}</span> <!-- Dynamic data here -->
            </div>
        </div>
        <!-- Total Sales Returns Card -->
        <div class="bg-white p-6 rounded-lg shadow-lg flex justify-between items-center">
            <div class="flex items-center">
                <span class="text-2xl font-bold text-red-500">Total Sales Returns</span>
            </div>
            <div class="text-right">
                <span class="text-3xl font-semibold text-gray-800">{{ $totalSaleReturns }}</span> <!-- Dynamic data here -->
            </div>
        </div>
        @endif

        @if(auth()->user()->hasAnyRole(['admin', 'purchase-manager'])) <!-- For Admin and Purchase Manager -->
        <!-- Total Purchases Card -->
        <div class="bg-white p-6 rounded-lg shadow-lg flex justify-between items-center">
            <div class="flex items-center">
                <span class="text-2xl font-bold text-green-500">Total Purchases</span>
            </div>
            <div class="text-right">
                <span class="text-3xl font-semibold text-gray-800">{{ $totalPurchases }}</span> <!-- Dynamic data here -->
            </div>
        </div>
        <!-- Total Purchase Returns Card -->
        <div class="bg-white p-6 rounded-lg shadow-lg flex justify-between items-center">
            <div class="flex items-center">
                <span class="text-2xl font-bold text-yellow-500">Total Purchase Returns</span>
            </div>
            <div class="text-right">
                <span class="text-3xl font-semibold text-gray-800">{{ $totalPurchaseReturns }}</span> <!-- Dynamic data here -->
            </div>
        </div>
        @endif

        @if(auth()->user()->hasAnyRole(['admin'])) <!-- For Admin -->
        <!-- Total Products Card -->
        <div class="bg-white p-6 rounded-lg shadow-lg flex justify-between items-center">
            <div class="flex items-center">
                <span class="text-2xl font-bold text-purple-500">Total Products</span>
            </div>
            <div class="text-right">
                <span class="text-3xl font-semibold text-gray-800">{{ $totalprod }}</span> <!-- Dynamic data here -->
            </div>
        </div>
        @endif
    </div>

    <!-- Daily Stats Section -->
    <div class="mt-8 bg-white p-6 rounded-lg shadow-lg">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Daily Statistics</h3>
        <div class="flex justify-between items-center">
            @if(auth()->user()->hasAnyRole(['admin', 'sales-manager']))
            <div>
                <span class="text-xl font-medium text-gray-700">Total Sales Today</span>
                <h4 class="text-3xl font-bold text-blue-500">{{ $salesToday }}</h4> <!-- Dynamic data here -->
            </div>
            @endif
            @if(auth()->user()->hasAnyRole(['admin', 'purchase-manager']))
            <div>
                <span class="text-xl font-medium text-gray-700">Total Purchases Today</span>
                <h4 class="text-3xl font-bold text-green-500">{{ $purchasesToday }}</h4> <!-- Dynamic data here -->
            </div>
            @endif
        </div>
    </div>
</div>


@endsection