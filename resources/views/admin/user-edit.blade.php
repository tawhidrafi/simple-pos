@extends('layouts.mainLayout')

@section('title', 'Users')

@section('content')

<!-- Display Validation Errors -->
@if ($errors->any())
<x-layout.error />
@endif

<div class="bg-white shadow-md rounded-lg mb-8">
    <div class="p-6">
        <form id="role-form" method="POST" action="{{ route('user.updateRole', $user->id) }}">
            @csrf
            @method('put')

            <label for="role-id" class="block mb-2">Assign Role for: {{ $user->name }}</label>
            <select name="role_id" id="role-id" required class="block w-1/3 p-2 mb-4 border border-gray-300 rounded-lg">
                <option value="" selected>Select Role</option>
                @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 block">Assign Role</button>
        </form>

    </div>
</div>
@endsection