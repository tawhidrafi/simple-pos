@extends('layouts.mainLayout')

@section('title', 'User Profile')

@section('content')

<!-- Display Validation Errors -->
@if ($errors->any())
<x-layout.error />
@endif

<div class="bg-white shadow-md rounded-lg p-6 w-full">
    <h2 class="text-xl font-semibold mb-6">Profile</h2>
    <div class="flex flex-col md:flex-row items-center md:items-start gap-12">
        <!-- Profile Image -->
        <div class="relative w-20 h-20 group">
            <!-- Display User's Profile Picture -->
            <div class="w-full h-full bg-blue-500 text-white flex items-center justify-center text-xl font-bold rounded-full overflow-hidden">
                <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('/files/avatar.png') }}"
                    alt="User Image" class="object-cover w-full h-full">
            </div>

            <!-- Pencil Icon (Visible on Hover) -->
            <button
                class="absolute top-0 right-0 bg-gray-800 text-white p-1 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"
                onclick="toggleUpdateForm()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 11l6-6M13.414 3.586a2 2 0 112.828 2.828L6 16l-4 1 1-4L13.414 3.586z" />
                </svg>
            </button>

            <!-- Update Profile Picture Form -->
            <form
                id="update-form"
                action=" {{ route('profile.updatePicture', Auth::user()->id) }} "
                method="POST"
                enctype="multipart/form-data"
                class="mt-4 hidden">
                @csrf
                @method('PUT')

                <div class="flex flex-col space-y-2">
                    <!-- File Input -->
                    <label for="photo" class="px-2 py-1 text-blue-500 rounded-lg cursor-pointer hover:bg-blue-700 hover:text-white">
                        Choose
                    </label>

                    <input type="file" name="photo" id="photo" accept="image/*"
                        class="hidden w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" required>

                    <!-- Submit Button -->
                    <button type="submit" class="px-2 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Update
                    </button>
                </div>
            </form>
        </div>


        <!-- Profile Info -->
        <div class="flex-1 space-y-4 grid md:grid-cols-3 gap-4">
            <!-- Name -->
            <div>
                <p class="text-sm font-medium text-gray-700">
                    Name
                </p>
                <p class="mt-1 text-gray-800">
                    {{ Auth::user()->name ?? 'John Smith' }}
                </p>
            </div>
            <!-- Email -->
            <div>
                <p class="text-sm font-medium text-gray-700">
                    Email
                </p>
                <p class="mt-1 text-gray-800">
                    {{ Auth::user()->email ?? 'N/A' }}
                </p>
            </div>
            <!-- Phone Number -->
            <div>
                <p class="text-sm font-medium text-gray-700">
                    Phone Number
                </p>
                <p class="mt-1 text-gray-800">
                    {{ Auth::user()->phone ?? 'N/A' }}
                </p>
            </div>
            <!-- Address -->
            <div>
                <p class="text-sm font-medium text-gray-700">
                    Address
                </p>
                <p class="mt-1 text-gray-800">
                    {{ Auth::user()->address ?? 'N/A' }}
                </p>
            </div>
            <!-- Role -->
            <div>
                <p class="text-sm font-medium text-gray-700">
                    Role
                </p>
                <p class="mt-1 text-gray-800">
                    {{ Auth::user()->role->name ?? 'N/A' }}
                </p>
            </div>
        </div>
    </div>
    <!-- Edit Button -->
    <div class="mt-6 flex justify-end gap-4">
        <button
            data-modal-toggle="editPasswordModal"
            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Edit Password
        </button>
        <button
            data-modal-toggle="editProfileModal"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Edit Profile
        </button>
    </div>
</div>
@endsection

<!-- Modal for Adding New Account -->
@section('modal')
<div
    id="editPasswordModal"
    tabindex="-1"
    aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex justify-center items-center p-4 min-h-screen bg-gray-900 bg-opacity-50">
    <div class="relative w-full h-auto max-w-2xl">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal Header -->
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="text-xl font-semibold text-gray-900">Edit Password</h3>
                <button
                    type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-toggle="editPasswordModal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="p-6 space-y-6">
                <form
                    action=" {{ route('profile.updatePassword', Auth::user()->id) }} s"
                    method="POST">
                    @csrf
                    @method('put')

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                        <input type="password" name="password" id="password" class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-lg" placeholder=".............." required>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Cofirm New Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-lg" placeholder=".............." required>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">Set</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div
    id="editProfileModal"
    tabindex="-1"
    aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex justify-center items-center p-4 min-h-screen bg-gray-900 bg-opacity-50">
    <div class="relative w-full h-auto max-w-2xl">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal Header -->
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="text-xl font-semibold text-gray-900">Edit Profile</h3>
                <button
                    type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-toggle="editProfileModal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="p-6 space-y-6">
                <form
                    action="{{ route('profile.update', Auth::user()->id) }}"
                    method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-lg"
                                value="{{ old('name') ?? Auth::user()->name }}">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-lg"
                                value="{{ old('email') ?? Auth::user()->email }}">
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                            <input
                                type="tel"
                                name="phone"
                                id="phone"
                                class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-lg"
                                value="{{ old('phone') ?? Auth::user()->phone }}">
                        </div>

                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <textarea
                                name="address"
                                id="address"
                                rows="2"
                                class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-lg">{{ old('address') ?? Auth::user()->address }}</textarea>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Modal toggle script
    document.querySelectorAll('[data-modal-toggle]').forEach(button => {
        button.addEventListener('click', () => {
            const modalId = button.getAttribute('data-modal-toggle');
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        });
    });
    //
    function toggleUpdateForm() {
        const form = document.getElementById('update-form');
        form.classList.toggle('hidden');
    }
</script>
@vite(['resources/js/alert.js'])
@endpush