@extends('layouts.mainLayout')

@section('content')
<div class="bg-white shadow-md rounded-lg">
    <div class="p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Sale Details</h2>

        <!-- Details -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- customer Info -->
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Customer Info</h3>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li> Name : {{ $sale->customer->name }} </li>
                    <li> Email : {{ $sale->customer->email }} </li>
                    <li> Phone : {{ $sale->customer->phone }} </li>
                    <li> Address : {{ $sale->customer->address ?? 'N/A' }} </li>
                </ul>
            </div>

            <!-- Sale Info -->
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Sale Info</h3>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>Date : {{ $sale->date }}</li>
                    <li>Invoice Number : {{ $sale->invoice_number }}</li>
                    <li>Total : {{ $sale->total }}</li>
                    <li>Delivery Status : {{ $sale->delivery_status }}</li>
                    <li>Status : {{ $sale->status }}</li>
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
                            @if (!$sale->isDelivered())
                            <td class="py-2 px-4 text-center">
                                <form
                                    action="{{ route('sales.updateStatus', $sale->id) }}"
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

                            @if ($sale->canBeReturned())
                            <td class="py-2 px-4 text-center">
                                <a href="{{ route('sale-returns.create', $sale->id) }}">
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Initiate Return</button>
                                </a>
                            </td>
                            @endif

                            @if ($sale->isCompleted())
                            <td class="text-center py-2 px-4">
                                No action to perform
                            </td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Sale Items -->
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
                        @foreach ($sale->saleItems as $saleItem)
                        <tr>
                            <td class="py-2 px-4 text-right">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4 text-right">{{ $saleItem->product_code }}</td>
                            <td class="py-2 px-4 text-right">
                                @if ($saleItem->product)
                                {{ $saleItem->product->name }}
                                @elseif ($saleItem->variant)
                                {{ $saleItem->variant->variant_name }}
                                @endif
                            </td>
                            <td class="py-2 px-4 text-right">{{ $saleItem->unit_price }}</td>
                            <td class="py-2 px-4 text-right">{{ $saleItem->product_qty }}</td>
                            <td class="py-2 px-4 text-right">{{ $saleItem->subtotal }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Return list -->
        @if ($sale->saleReturn)
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
                            <td class="py-2 px-4 text-right">{{ $sale->saleReturn->date }}</td>
                            <td class="py-2 px-4 text-right">{{ $sale->saleReturn->invoice_number }}</td>
                            <td class="py-2 px-4 text-right">{{ $sale->saleReturn->total }}</td>
                            <td class="py-2 px-4 text-right">{{ $sale->saleReturn->status }}</td>
                            <td class="py-2 px-4 text-right">
                                <a href="{{ route('sale-returns.show', $sale->saleReturn->id) }}">
                                    <button class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">View</button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>

    <!-- Back Button -->
    <div class="px-6 py-4 bg-gray-50 text-center">
        <a href="{{ route('sales.index') }}">
            <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Back</button>
        </a>
    </div>
</div>
@endsection