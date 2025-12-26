@extends('layouts.mainLayout')

@section('content')
<div class="bg-white shadow-md rounded-lg">
    <div class="p-6">
        <!-- Sale LIST -->
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Sale List</h3>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-gray-600">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="py-2 px-4 text-right">Date</th>
                            <th class="py-2 px-4 text-right">Invoice No</th>
                            <th class="py-2 px-4 text-right">Customer</th>
                            <th class="py-2 px-4 text-right">Total Price</th>
                            <th class="py-2 px-4 text-right">Delivery Status</th>
                            <th class="py-2 px-4 text-right">Status</th>
                            <th class="py-2 px-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $sale)
                        <tr class="border-t">
                            <td class="py-2 px-4 text-right">{{ $sale->date }}</td>
                            <td class="py-2 px-4 text-right">{{ $sale->invoice_number }}</td>
                            <td class="py-2 px-4 text-right">{{ $sale->customer->name }}</td>
                            <td class="py-2 px-4 text-right">{{ $sale->total }}</td>
                            <td class="py-2 px-4 text-right">{{ ucfirst($sale->delivery_status) }}</td>
                            <td class="py-2 px-4 text-right">{{ ucfirst($sale->status) }}</td>
                            <td class="py-2 px-4 text-right">
                                <a href="{{ route('sales.show', $sale->id) }}" class="text-blue-500 hover:underline">
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