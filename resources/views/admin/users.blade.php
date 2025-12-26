@extends('layouts.mainLayout')

@section('title', 'Users')

@section('content')
<!-- Display Validation Errors -->
@if ($errors->any())
<x-layout.error />
@endif
<!-- User List Table -->
<div class="bg-white shadow-md rounded-lg mb-8">
    <div class="p-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-4">User List</h3>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-gray-600">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="py-2 px-4 text-left">Name</th>
                            <th class="py-2 px-4 text-left">Email</th>
                            <th class="py-2 px-4 text-left">Phone</th>
                            <th class="py-2 px-4 text-left">Role</th>
                            <th class="py-2 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr class="border-t">
                            <td class="py-2 px-4 text-left">{{ $user->name }}</td>
                            <td class="py-2 px-4 text-left">{{ $user->email }}</td>
                            <td class="py-2 px-4 text-left">{{ $user->phone }}</td>
                            <td class="py-2 px-4 text-left">{{ $user->role->name ?? 'Not assigned' }}</td>
                            <td class="py-4 px-4 text-right">
                                @if ($user ->role == NULL)
                                @endif
                                @if ($user ->role == NULL)
                                <a
                                    href="{{ route('user.assignRole', $user->id) }}"
                                    class="text-green-700 hover:text-white border-2 border-green-700 hover:bg-green-800 focus:outline-none font-medium rounded-lg text-sm px-2 py-1 text-centeropen-role-modal">
                                    Assign
                                </a>
                                @else
                                <a
                                    href="{{ route('user.assignRole', $user->id) }}"
                                    class="text-red-700 hover:text-white border-2 border-red-700 hover:bg-red-800 focus:outline-none font-medium rounded-lg text-sm px-2 py-1 text-centeropen-role-modal">
                                    Change Role
                                </a>
                                @endif
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

@push('scripts')
@vite(['resources/js/alert.js'])
@endpush