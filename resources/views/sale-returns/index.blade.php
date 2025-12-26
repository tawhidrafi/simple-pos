@extends('layouts.mainLayout')

@section('content')
<div class="bg-white shadow-md rounded-lg">
    <div class="p-6">
        <!-- Return LIST -->
        <div class="">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Return List</h3>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-gray-600">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="py-2 px-4 text-left">#</th>
                            <th class="py-2 px-4 text-right">Date</th>
                            <th class="py-2 px-4 text-right">Invoice No.</th>
                            <th class="py-2 px-4 text-right">Sale Invoice No.</th>
                            <th class="py-2 px-4 text-right">Sale Amount</th>
                            <th class="py-2 px-4 text-right">Refundable Amount</th>
                            <th class="py-2 px-4 text-right">Status</th>
                            <th class="py-2 px-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($saleReturns as $saleReturn)
                        <tr class="border-t">
                            <td class="py-2 px-4 text-right">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4 text-right">{{ $saleReturn->date }}</td>
                            <td class="py-2 px-4 text-right">{{ $saleReturn->invoice_number }}</td>
                            <td class="py-2 px-4 text-right">
                                <a href="{{ route('sales.show', $saleReturn->sale->id) }}" class="text-blue-500">
                                    {{ $saleReturn->sale->invoice_number }}
                                </a>
                            </td>
                            <td class="py-2 px-4 text-right">{{ $saleReturn->sale->total }}</td>
                            <td class="py-2 px-4 text-right">{{ $saleReturn->total }}</td>
                            <td class="py-2 px-4 text-right">{{ ucfirst($saleReturn->status) }}</td>
                            <td class="py-2 px-4 text-right">
                                <a href="{{ route('sale-returns.show', $saleReturn->id) }}" class="text-blue-500 hover:underline">
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