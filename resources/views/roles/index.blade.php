@extends('layouts.mainLayout')

@section('title', 'Roles')

@section('content')
<!-- Header Section with Add New Button -->
<div class="flex justify-between mb-4">
    <h2 class="text-2xl font-extrabold">Roles</h2>

    <a href="{{ route('roles.create') }}">
        <button
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Add New
        </button>
    </a>
</div>

<!-- Roles List Table -->
<div class="bg-white shadow-md rounded-lg">
    <div class="p-6">
        <div class="border rounded-lg overflow-hidden">
            <table class="w-full text-sm text-gray-600">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        <th class="py-2 px-4 text-left">Role</th>
                        <th class="py-2 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                    <tr class="border-t">
                        <td class="py-2 px-4 text-left">{{ $role->name }}</td>
                        <td class="py-2 px-4 text-right">
                            <a
                                href=" {{ route('roles.show', $role->id) }}"
                                class="text-blue-500 hover:underline">
                                <button class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">
                                    View
                                </button>
                            </a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white ml-4 px-2 py-1 rounded hover:bg-red-700">
                                    Delete Role
                                </button>
                            </form>
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
@endsection

@push('scripts')
@vite(['resources/js/alert.js'])
@endpush