@extends('layouts.mainLayout')

@section('title', 'Role')

@section('content')

<div class="bg-white shadow-md rounded-lg mb-12">
    <div class="p-6">
        <div class="overflow-hidden p-1">
            <form action="{{ route('roles.update', $role->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="text" name="name" id="role-name" class="w-full p-2 border border-gray-300 rounded mb-4" value="{{ old('name') ?? $role->name }}">

                <h2 class="text-xl font-semibold mb-6">Permissions</h2>

                <div class="grid grid-cols-3 gap-4 mb-4">
                    @foreach($permissions as $permission)
                    <div class="flex items-center mb-2">
                        <input
                            type="checkbox"
                            name="permissions[]"
                            value="{{ $permission->name }}"
                            id="{{ $permission->name }}"
                            class="form-checkbox h-5 w-5 text-blue-600"
                            @if(in_array($permission->name, $assignedPermissions)) checked @endif>
                        <label for="{{ $permission->name }}" class="ml-2">
                            {{ ucwords(str_replace('-', ' ', $permission->name)) }}
                        </label>
                    </div>
                    @endforeach
                </div>

                <button type="submit" class="bg-blue-600 text-white px-12 py-3 rounded hover:bg-blue-700">Update Role</button>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    const checkboxes = document.querySelectorAll('.form-checkbox');
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', () => {
            if (checkbox.checked) {
                checkbox.classList.add('bg-blue-600');
            } else {
                checkbox.classList.remove('bg-blue-600');
            }
        });
    });
</script>
@endpush