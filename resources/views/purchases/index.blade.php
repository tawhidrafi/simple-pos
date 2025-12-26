@extends('layouts.mainLayout')

@section('content')
<div class="bg-white shadow-md rounded-lg">
    <div class="p-6">
        <!-- Purchase LIST -->
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Purchase List</h3>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-gray-600">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="py-2 px-4 text-right">Date</th>
                            <th class="py-2 px-4 text-right">Invoice No</th>
                            <th class="py-2 px-4 text-right">Supplier</th>
                            <th class="py-2 px-4 text-right">Total Price</th>
                            <th class="py-2 px-4 text-right">Paid</th>
                            <th class="py-2 px-4 text-right">Due</th>
                            <th class="py-2 px-4 text-right">Payment Status</th>
                            <th class="py-2 px-4 text-right">Delivery Status</th>
                            <th class="py-2 px-4 text-right">Status</th>
                            <th class="py-2 px-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchases as $purchase)
                        <tr class="border-t">
                            <td class="py-2 px-4 text-right">{{ $purchase->date }}</td>
                            <td class="py-2 px-4 text-right">{{ $purchase->invoice_number }}</td>
                            <td class="py-2 px-4 text-right">{{ $purchase->supplier->name }}</td>
                            <td class="py-2 px-4 text-right">{{ $purchase->total }}</td>
                            <td class="py-2 px-4 text-right">{{ $purchase->paid_amount }}</td>
                            <td class="py-2 px-4 text-right">{{ $purchase->due_amount }}</td>
                            <td class="py-2 px-4 text-right">{{ ucfirst($purchase->payment_status) }}</td>
                            <td class="py-2 px-4 text-right">{{ ucfirst($purchase->delivery_status) }}</td>
                            <td class="py-2 px-4 text-right">{{ ucfirst($purchase->status) }}</td>
                            <td class="py-2 px-4 text-right">
                                <a href="{{ route('purchases.show', $purchase->id) }}" class="text-blue-500 hover:underline">
                                    <button class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">
                                        View
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection