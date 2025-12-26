@extends('layouts.mainLayout')

@section('title', 'Supplier')

@section('content')

<!-- supplier Info -->
<div class="bg-white shadow-md rounded-lg mb-8">
    <div class="p-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Supplier Info</h3>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-gray-600">
                    <tbody>
                        <tr class="border-t">
                            <td class="py-4 px-4 text-left">Name : {{ $supplier->name }}</td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-4 px-4 text-left">Email : {{ $supplier->email }}</td>
                            <td class="py-4 px-4 text-left">Phone : {{ $supplier->phone }}</td>
                            <td class="py-4 px-4 text-left">Company : {{ $supplier->company }}</td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-4 px-4 text-left">Address : {{ $supplier->address }}</td>
                            <td class="py-4 px-4 text-left">City : {{ $supplier->city }}</td>
                            <td class="py-4 px-4 text-left">TIN : {{ $supplier->tin }}</td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-4 px-4 text-left">Status : {{ $supplier->status }}</td>
                            <td class="px-4 py-4">
                                Action
                                <a
                                    type="button"
                                    href="{{ route('suppliers.index') }}"
                                    class="text-blue-700 hover:text-white border-2 border-blue-700 hover:bg-blue-800 focus:outline-none font-medium rounded-lg text-sm px-2.5 py-1 text-center mx-4">
                                    Back
                                </a>
                                <a
                                    type="button"
                                    href="{{ route('suppliers.edit', $supplier->id) }}"
                                    class="text-green-700 hover:text-white border-2 border-green-700 hover:bg-green-800 focus:outline-none font-medium rounded-lg text-sm px-2.5 py-1 text-center mx-4">
                                    Edit
                                </a>
                                <form
                                    action="{{ route('suppliers.destroy', $supplier->id) }}"
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

<!-- Purchase list Table -->
<div class="bg-white shadow-md rounded-lg mb-8">
    <div class="p-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Purchases Made</h3>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-gray-600">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="py-2 px-4 text-left">Date</th>
                            <th class="py-2 px-4 text-left">Invoice Number</th>
                            <th class="py-2 px-4 text-left">Total Cost</th>
                            <th class="py-2 px-4 text-left">Paid</th>
                            <th class="py-2 px-4 text-left">Due</th>
                            <th class="py-2 px-4 text-left">Payment Status</th>
                            <th class="py-2 px-4 text-left">Delivery Status</th>
                            <th class="py-2 px-4 text-left">Status</th>
                            <th class="py-2 px-4 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($supplier->purchases as $purchase)
                        <tr class="border-t">
                            <td class="py-2 px-4 text-left">{{ $purchase->date }}</td>
                            <td class="py-2 px-4 text-left">{{ $purchase->invoice_number }}</td>
                            <td class="py-2 px-4 text-left">{{ $purchase->total }}</td>
                            <td class="py-2 px-4 text-left">{{ $purchase->paid_amount }}</td>
                            <td class="py-2 px-4 text-left">{{ $purchase->due_amount }}</td>
                            <td class="py-2 px-4 text-left">{{ ucfirst($purchase->payment_status) }}</td>
                            <td class="py-2 px-4 text-left">{{ ucfirst($purchase->delivery_status) }}</td>
                            <td class="py-2 px-4 text-left">{{ ucfirst($purchase->status) }}</td>
                            <td class="py-2 px-4 text-left">
                                <a href="{{ route('purchases.show', $purchase->id) }}" class="text-blue-500 hover:underline">View</a>
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