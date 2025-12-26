@extends('layouts.mainLayout')

@section('title', 'Product Categories')

@section('content')
<!-- Display Validation Errors -->
@if ($errors->any())
<x-layout.error />
@endif

<!-- Header Section with Add New Button -->
<div class="flex justify-between mb-4">
    <h2 class="text-2xl font-extrabold">Categories</h2>

    <!-- Modal toggle -->
    <button
        data-modal-target="crud-modal"
        data-modal-toggle="crud-modal"
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
        type="button">
        Add Category
    </button>
</div>

<!-- Categories Table -->
<div class="bg-white shadow-md rounded-lg mb-8">
    <div class="p-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Categories</h3>
            <div class="border rounded-lg overflow-hidden">
                <table class="w-full text-sm text-gray-600">
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="py-2 px-4 text-left">Name</th>
                            <th class="py-2 px-4 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr class="border-t">
                            <td class="py-2 px-4 text-left">{{ $category->name }}</td>
                            <td class="py-2 px-4 text-left">
                                <a href="{{ route('categories.show', $category->id) }}">
                                    <button
                                        type="button"
                                        class="text-blue-700 hover:text-white border-2 border-blue-700 hover:bg-blue-800 focus:outline-none font-medium rounded-lg text-sm px-2.5 py-1.5 text-center mr-4 open-edit-modal">
                                        View
                                    </button>
                                </a>
                                <button
                                    type="button"
                                    data-modal-target="crud-modal"
                                    data-modal-toggle="crud-modal"
                                    data-category-id="{{ $category->id }}"
                                    data-category-name="{{ $category->name }}"
                                    class="text-green-700 hover:text-white border-2 border-green-700 hover:bg-green-800 focus:outline-none font-medium rounded-lg text-sm px-2.5 py-1.5 text-center mr-4 open-edit-modal">
                                    Edit
                                </button>
                                <form
                                    action="{{ route('categories.destroy', $category->id) }}"
                                    method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="text-red-700 hover:text-white border-2 border-red-700 hover:bg-red-800 focus:outline-none font-medium rounded-lg text-sm px-2.5 py-1.5 text-center ">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="border-t">
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

<!-- Modal for Adding New Account -->
@section('modal')
<div
    id="crud-modal"
    tabindex="-1"
    aria-hidden="true"
    data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div
        class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div
            class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3
                    class="text-lg font-semibold text-gray-900">
                    Create New Category
                </h3>
                <button
                    type="button"
                    data-modal-toggle="crud-modal"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                    <svg
                        class="w-3 h-3"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 14 14">
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form
                id="category-form"
                class="p-4 md:p-5"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="category-id" name="id">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                            Name
                        </label>
                        <input
                            type="text"
                            name="name"
                            id="category-name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Electronics"
                            required>
                    </div>
                </div>
                <button
                    type="submit"
                    id="category-submit-button"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Add new category
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@vite(['resources/js/category.js'])
@vite(['resources/js/alert.js'])
@endpush