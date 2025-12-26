@extends('layouts.mainLayout')

@section('content')
<div class="bg-white shadow-md rounded-lg">
    <div class="p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Purchase Return Details</h2>
        <p class="text-sm text-gray-500 mb-6">Purchase Return Details : <span class="font-medium">{{ $purchaseReturn->invoice_number }}</span></p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Supplier Info -->
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Customer Info</h3>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li> Name : {{ $purchaseReturn->purchase->supplier->name }} </li>
                    <li> EMail : {{ $purchaseReturn->purchase->supplier->email }} </li>
                    <li> Phone : {{ $purchaseReturn->purchase->supplier->phone }} </li>
                    <li> Address : {{ $purchaseReturn->purchase->supplier->address ?? 'N/A' }} </li>
                </ul>
            </div>

            <!-- purchase Info -->
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Purchase Info</h3>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>
                        Purchase Invoice :
                        <a href="{{ route('purchases.show', $purchaseReturn->purchase->id) }}">
                            {{ $purchaseReturn->purchase->invoice_number }}
                        </a>
                    </li>
                    <li> Total : {{ $purchaseReturn->purchase->total }} </li>
                    <li> Status : {{ $purchaseReturn->purchase->status }} </li>
                </ul>
            </div>

            <!-- Return Info -->
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Return Info</h3>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>Date : {{ $purchaseReturn->date }} </li>
                    <li>Refundable Amount : {{ $purchaseReturn->total }} </li>
                    <li>Status : {{ $purchaseReturn->status }} </li>
                </ul>
            </div>
        </div>

        <!-- Return Items -->
        <div class="mt-8">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Return Summary</h3>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-gray-600">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="py-2 px-4 text-left">#</th>
                            <th class="py-2 px-4 text-right">Product Code</th>
                            <th class="py-2 px-4 text-right">Product Name</th>
                            <th class="py-2 px-4 text-right">UNIT PRICE</th>
                            <th class="py-2 px-4 text-right">QUANTITY</th>
                            <th class="py-2 px-4 text-right">SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchaseReturn->purchaseReturnItems as $purchaseReturnItem)
                        <tr class="border-t">
                            <td class="py-2 px-4 text-right">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4 text-right">{{ $purchaseReturnItem->product_code }}</td>
                            <td class="py-2 px-4 text-right">
                                @if ($purchaseReturnItem->product)
                                {{ $purchaseReturnItem->product->name }}
                                @elseif ($purchaseReturnItem->variant)
                                {{ $purchaseReturnItem->variant->variant_name }}
                                @endif
                            </td>
                            <td class="py-2 px-4 text-right">{{ $purchaseReturnItem->unit_price }}</td>
                            <td class="py-2 px-4 text-right">{{ $purchaseReturnItem->product_qty }}</td>
                            <td class="py-2 px-4 text-right">{{ $purchaseReturnItem->subtotal }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Update Status -->
    @if ($purchaseReturn->status == 'pending')
    <div class="px-6 py-4 bg-gray-50 text-center">
        <form action="{{ route('purchase-returns.updateStatus', $purchaseReturn->id) }}" method="POST">
            @csrf
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Mark as Completed</button>
        </form>
    </div>
    @endif

    <!-- Back Button -->
    <div class="px-6 py-4 bg-gray-50 text-center">
        <a href="{{ route('purchase-returns.index') }}">
            <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Back</button>
        </a>
    </div>
</div>
@endsection