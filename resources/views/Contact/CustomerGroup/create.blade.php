<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <section>
        @extends('layout.nav')
        <!-- container -->
        <div class="p-4 sm:ml-64">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 me-2 mb-8 focus:outline-none">
                    <a href="{{ route('CustomerGroup.index') }}">Back to list</a>
                </button>
                <h2 class="mb-4 text-xl font-bold text-gray-900">Add a new group for customers</h2>
                <form enctype="multipart/form-data" action="{{ route('CustomerGroup.store')}}" method="post">
                    @csrf
                    @method('post')
                    <div class="w-[32rem]">
                        <div class="w-full mb-4">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Customer Group
                                Name</label>
                            <input value="{{ old('title') }}" type="text" name="title" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Group Name">
                            @error('title')
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    <span class="font-medium">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="w-full mb-4">
                            <label for="discount" class="block mb-2 text-sm font-medium text-gray-900">Discount</label>
                            <input value="{{ old('discount') }}" type="number" name="discount" id="discount"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Discount. Default is 0">
                            @error('discount')
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    <span class="font-medium">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="w-full mb-4">
                            <label for="is_default"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select any
                                Group</label>
                            <select id="is_default" name="is_default"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="yes">Yes</option>
                                <option value="no" selected>No</option>
                            </select>
                            @error('is_default')
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    <span class="font-medium">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg">Add
                            Group</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>
</body>

</html>