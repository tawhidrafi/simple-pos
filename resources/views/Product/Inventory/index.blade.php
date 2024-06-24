@extends('layout.head')

<body>
    @section('title', 'Product | Inventory')

    <section class="py-4">
        @extends('layout.nav')
        <!-- container -->
        <!-- TABLE -->
        <div class="p-4 sm:ml-64">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
                <h2 class="mb-4 text-xl font-bold text-gray-900">Index List</h2>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    SKU
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Barcode
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Variant
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Group
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Brand
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Purchase Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Selling Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Inventory
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b">
                                <td scope="col" class="px-6 py-">
                                    25
                                </td>
                                <td scope="col" class="px-6 py-4">
                                    12341234
                                </td>
                                <td scope="col" class="px-6 py-4">
                                    369369258
                                </td>
                                <td scope="col" class="px-6 py-4">
                                    New Neck Tie
                                </td>
                                <td scope="col" class="px-6 py-4">

                                </td>
                                <td scope="col" class="px-6 py-4">
                                    Tie
                                </td>
                                <td scope="col" class="px-6 py-4">
                                    Tie
                                </td>
                                <td scope="col" class="px-6 py-4">
                                    Dunhill
                                </td>
                                <td scope="col" class="px-6 py-4">
                                    $1,800.00
                                </td>
                                <td scope="col" class="px-6 py-4">
                                    $2,000.00
                                </td>
                                <td scope="col" class="px-6 py-4">
                                    100
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