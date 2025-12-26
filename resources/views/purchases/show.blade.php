@extends('layouts.mainLayout')

@section('content')
<div class="bg-white shadow-md rounded-lg">
    <div class="p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Purchase Details</h2>

        <!-- Details -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Supplier Info -->
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Supplier Info</h3>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li> Name : {{ $purchase->supplier->name }} </li>
                    <li> Email : {{ $purchase->supplier->email }} </li>
                    <li> Phone : {{ $purchase->supplier->phone }} </li>
                    <li> Address : {{ $purchase->supplier->address ?? 'N/A' }} </li>
                </ul>
            </div>

            <!-- purchase Info -->
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Purchase Info</h3>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>Date : {{ $purchase->date }}</li>
                    <li>Invoice Number : {{ $purchase->invoice_number }}</li>
                    <li>Total : {{ $purchase->total }}</li>
                    <li>Paid : {{ $purchase->paid_amount }}</li>
                    <li>Due : {{ $purchase->due_amount }}</li>
                    <li>Payment Status : {{ $purchase->payment_status }}</li>
                    <li>Delivery Status : {{ $purchase->delivery_status }}</li>
                    <li>Status : {{ $purchase->status }}</li>
                </ul>
            </div>
        </div>

        <!-- Actions -->
        <div class="mt-8">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Actions</h3>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-gray-600">
                    <tbody>
                        <tr class="border-t">
                            @if (!$purchase->isPaid())
                            <td class="py-2 text-center">
                                <a href="{{ route('purchases.pay.show', $purchase->id) }}">
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Pay Due</button>
                                </a>
                            </td>
                            @endif

                            @if (!$purchase->isDelivered())
                            <td class="py-2 px-4 text-center">
                                <form
                                    action="{{ route('purchases.updateStatus', $purchase->id) }}"
                                    method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('post')
                                    <button
                                        type="submit"
                                        class="text-blue-700 hover:text-white border-2 border-blue-700 hover:bg-blue-800 focus:outline-none font-medium rounded-lg text-sm px-2.5 py-1.5 text-center ">
                                        Mark as Delivered
                                    </button>
                                </form>
                            </td>
                            @endif

                            @if ($purchase->canBeReturned())
                            <td class="py-2 px-4 text-center">
                                <a href="{{ route('purchase-returns.create', $purchase->id) }}">
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Initiate Return</button>
                                </a>
                            </td>
                            @endif

                            @if ($purchase->isCompleted())
                            <td class="text-center py-2 px-4">
                                No action to perform
                            </td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Purchased Items -->
        <div class="mt-8">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Order List</h3>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-gray-600">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="py-2 px-4 text-right">#</th>
                            <th class="py-2 px-4 text-right">Product Code</th>
                            <th class="py-2 px-4 text-right">Product Name</th>
                            <th class="py-2 px-4 text-right">Unit Cost</th>
                            <th class="py-2 px-4 text-right">Quantity</th>
                            <th class="py-2 px-4 text-right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchase->purchaseItems as $purchaseItem)
                        <tr>
                            <td class="py-2 px-4 text-right">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4 text-right">{{ $purchaseItem->product_code }}</td>
                            <td class="py-2 px-4 text-right">
                                @if ($purchaseItem->product)
                                {{ $purchaseItem->product->name }}
                                @elseif ($purchaseItem->variant)
                                {{ $purchaseItem->variant->variant_name }}
                                @endif
                            </td>
                            <td class="py-2 px-4 text-right">{{ $purchaseItem->unit_cost }}</td>
                            <td class="py-2 px-4 text-right">{{ $purchaseItem->product_qty }}</td>
                            <td class="py-2 px-4 text-right">{{ $purchaseItem->subtotal }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Return list -->
        @if ($purchase->purchaseReturn)
        <div class="mt-8">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Return List for this Product</h3>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-gray-600">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="py-2 px-4 text-right">Date</th>
                            <th class="py-2 px-4 text-right">Invoice Number</th>
                            <th class="py-2 px-4 text-right">Refundable Amount</th>
                            <th class="py-2 px-4 text-right">Status</th>
                            <th class="py-2 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t">
                            <td class="py-2 px-4 text-right">{{ $purchase->purchaseReturn->date }}</td>
                            <td class="py-2 px-4 text-right">{{ $purchase->purchaseReturn->invoice_number }}</td>
                            <td class="py-2 px-4 text-right">{{ $purchase->purchaseReturn->total }}</td>
                            <td class="py-2 px-4 text-right">{{ $purchase->purchaseReturn->status }}</td>
                            <td class="py-2 px-4 text-right">
                                <a href="{{ route('purchase-returns.show', $purchase->purchaseReturn->id) }}">
                                    <button class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">View</button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        <!-- Payment List -->
        <div class="mt-8">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Payments for the purchase</h3>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-gray-600">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="py-2 px-4 text-left">#</th>
                            <th class="py-2 px-4 text-right">Date</th>
                            <th class="py-2 px-4 text-right">Amount</th>
                            <th class="py-2 px-4 text-right">Payment Method</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($purchase->purchasePayments as $payment)
                        <td class="py-2 px-4 text-right">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 text-right">{{ $payment->created_at }}</td>
                        <td class="py-2 px-4 text-right">{{ $payment->paid_amount }}</td>
                        <td class="py-2 px-4 text-right">{{ $payment->paymentMethod->name ?? 'N/A' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center py-2 px-4 border-b">No data Available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <div class="px-6 py-4 bg-gray-50 text-center">
        <a href="{{ route('purchases.index') }}">
            <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Back</button>
        </a>
    </div>
</div>
@endsection