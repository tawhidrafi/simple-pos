@extends('layouts.mainLayout')

@section('title', 'Customer')

@section('content')

<!-- customer Info -->
<div class="bg-white shadow-md rounded-lg mb-8">
    <div class="p-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Customer Info</h3>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-gray-600">
                    <tbody>
                        <tr class="border-t">
                            <td class="py-4 px-4 text-left">Name : {{ $customer->name }}</td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-4 px-4 text-left">Email : {{ $customer->email }}</td>
                            <td class="py-4 px-4 text-left">Phone : {{ $customer->phone }}</td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-4 px-4 text-left">Address : {{ $customer->address }}</td>
                            <td class="py-4 px-4 text-left">City : {{ $customer->city }}</td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-4 px-4 text-left">Status : {{ $customer->status }}</td>
                            <td class="px-4 py-4">
                                Action
                                <a
                                    type="button"
                                    href="{{ route('customers.index') }}"
                                    class="text-blue-700 hover:text-white border-2 border-blue-700 hover:bg-blue-800 focus:outline-none font-medium rounded-lg text-sm px-2.5 py-1 text-center mx-4">
                                    Back
                                </a>
                                <a
                                    type="button"
                                    href="{{ route('customers.edit', $customer->id) }}"
                                    class="text-green-700 hover:text-white border-2 border-green-700 hover:bg-green-800 focus:outline-none font-medium rounded-lg text-sm px-2.5 py-1 text-center mx-4">
                                    Edit
                                </a>
                                <form
                                    action="{{ route('customers.destroy', $customer->id) }}"
                                    method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="text-red-700 hover:text-white border-2 border-red-700 hover:bg-red-800 focus:outline-none font-medium rounded-lg text-sm px-2.5 py-1 text-center mx-4">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Sale list Table -->
<div class="bg-white shadow-md rounded-lg mb-8">
    <div class="p-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Sale Made</h3>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-gray-600">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="py-2 px-4 text-left">Date</th>
                            <th class="py-2 px-4 text-left">Invoice Number</th>
                            <th class="py-2 px-4 text-left">Total Cost</th>
                            <th class="py-2 px-4 text-left">Status</th>
                            <th class="py-2 px-4 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customer->sales as $sale)
                        <tr class="border-t">
                            <td class="py-2 px-4 text-left">{{ $sale->date }}</td>
                            <td class="py-2 px-4 text-left">{{ $sale->invoice_number }}</td>
                            <td class="py-2 px-4 text-left">{{ $sale->total }}</td>
                            <td class="py-2 px-4 text-left">{{ ucfirst($sale->status) }}</td>
                            <td class="py-2 px-4 text-left">
                                <a href="{{ route('sales.show', $sale->id) }}" class="text-blue-500 hover:underline">View</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="py-2 px-4 text-center">No data available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection