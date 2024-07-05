@extends('layout.head')

<body>
    @section('title', 'All Products')
    <section class="py-4">
        @include('layout.nav')
        <!-- container -->
        <!-- Modal -->
        @include('layout.successModal')
        <!-- FORM -->
        <div class="p-4 sm:ml-64 mt-1">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
                <h2 class="mb-4 text-xl font-bold text-gray-900">Add a new Product</h2>
                @include('layout.form.productForm')
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
                                    Product Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    SKU
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Brand
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Group
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <td scope="col" class="px-6 py-3">
                                Apple Keyboard
                            </td>
                            <td scope="col" class="px-6 py-3">
                                145415154SDD45
                            </td>
                            <td scope="col" class="px-6 py-3">
                                Apple
                            </td>
                            <td scope="col" class="px-6 py-3">
                                Accesories
                            </td>
                            <td scope="col" class="px-6 py-3">
                                Laptop
                            </td>
                            <td scope="col" class="px-6 py-3">
                                Edit | Delete
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @include('layout.successModalScript')
</body>

</html>