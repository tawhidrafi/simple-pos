@extends('layout.head')

<body>
    @section('title', 'Customer Groups')

    <section class="py-4">
        @extends('layout.nav')
        <!-- container -->
        <!-- FORM -->
        <div class="p-4 sm:ml-64 mt-1">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                <h2 class="mb-4 text-xl font-bold text-gray-900">Add a new group for customers</h2>
                <form enctype="multipart/form-data" action="#" method="">
                    @csrf
                    @method('')
                    <div class="flex flex-wrap">
                        <div class="w-1/3 mb-4 mr-4">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Customer Group
                                Name</label>
                            <input value="" type="text" name="title" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Group Name">
                            @error('')
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    <span class="font-medium"></span>
                                </div>
                            @enderror
                        </div>
                        <div class="w-1/3 mb-4 mr-4">
                            <label for="discount" class="block mb-2 text-sm font-medium text-gray-900">Discount</label>
                            <input value="" type="number" name="discount" id="discount"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Discount. Default is 0">
                            @error('')
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    <span class="font-medium"></span>
                                </div>
                            @enderror
                        </div>
                        <div class="w-1/3 mb-4">
                            <label for="is_default"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select any
                                Group</label>
                            <select id="is_default" name="is_default"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="yes">Yes</option>
                                <option value="no" selected>No</option>
                            </select>
                            @error('')
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    <span class="font-medium"></span>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg">Add
                        Group</button>
                </form>
            </div>
        </div>
        <!-- TABLE -->
        <div class="p-4 sm:ml-64">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
                <h2 class="mb-4 text-xl font-bold text-gray-900">Index List</h2>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Product name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Color
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Apple MacBook Pro 17"
                                </th>
                                <td class="px-6 py-4">
                                    Silver
                                </td>
                                <td class="px-6 py-4">
                                    Laptop
                                </td>
                                <td class="px-6 py-4">
                                    $2999
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</body>

</html>