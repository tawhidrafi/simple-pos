@extends('layouts.mainLayout')

@section('content')
<div class="bg-white shadow-md rounded-lg">
    <div class="p-6">
        <!-- Return LIST -->
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Return List</h3>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-gray-600">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="py-2 px-4 text-left">#</th>
                            <th class="py-2 px-4 text-right">Date</th>
                            <th class="py-2 px-4 text-right">Invoice No.</th>
                            <th class="py-2 px-4 text-right">Purchase Invoice No.</th>
                            <th class="py-2 px-4 text-right">Purchase Amount</th>
                            <th class="py-2 px-4 text-right">Refundable Amount</th>
                            <th class="py-2 px-4 text-right">Status</th>
                            <th class="py-2 px-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchaseReturns as $purchaseReturn)
                        <tr class="border-t">
                            <td class="py-2 px-4 text-right">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4 text-right">{{ $purchaseReturn->date }}</td>
                            <td class="py-2 px-4 text-right">{{ $purchaseReturn->invoice_number }}</td>
                            <td class="py-2 px-4 text-right">
                                <a href="{{ route('purchases.show', $purchaseReturn->purchase->id) }}" class="text-blue-500">
                                    {{ $purchaseReturn->purchase->invoice_number }}
                                </a>
                            </td>
                            <td class="py-2 px-4 text-right">{{ $purchaseReturn->purchase->total }}</td>
                            <td class="py-2 px-4 text-right">{{ $purchaseReturn->total }}</td>
                            <td class="py-2 px-4 text-right">{{ ucfirst($purchaseReturn->status) }}</td>
                            <td class="py-2 px-4 text-right">
                                <a href="{{ route('purchase-returns.show', $purchaseReturn->id) }}" class="text-blue-500 hover:underline">
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