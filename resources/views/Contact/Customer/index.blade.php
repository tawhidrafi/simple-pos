@extends('layout.head')

<body>
    @section('title', 'Contact | Customer')

    <section class="py-4">
        @extends('layout.nav')
        <!-- container -->
        <!-- FORM -->
        <div class="p-4 sm:ml-64 mt-1">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
                <h2 class="mb-4 text-xl font-bold text-gray-900">Add a new customer</h2>
                <form enctype="multipart/form-data" action="#" method="">
                    @csrf
                    @method('')
                    <div class="flex flex-wrap">
                        <div class="w-1/3 mb-4 mr-4">
                            <label for="firstName" class="block mb-2 text-sm font-medium text-gray-900">First
                                Name</label>
                            <input value="" type="text" name="firstName" id="firstName"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="First Name">
                            @error('firstName')
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    <span class="font-medium"></span>
                                </div>
                            @enderror
                        </div>
                        <div class="w-1/3 mb-4 mr-4">
                            <label for="lastName" class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                            <input value="" type="text" name="lastName" id="lastName"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Last Name">
                            @error('lastName')
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    <span class="font-medium"></span>
                                </div>
                            @enderror
                        </div>
                        <div class="w-1/3 mb-4 mr-4">
                            <label for="company" class="block mb-2 text-sm font-medium text-gray-900">Company</label>
                            <input value="" type="text" name="company" id="company"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Company">
                            @error('company')
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    <span class="font-medium"></span>
                                </div>
                            @enderror
                        </div>
                        <div class="w-1/3 mb-4 mr-4">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input value="" type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Email">
                            @error('email')
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    <span class="font-medium"></span>
                                </div>
                            @enderror
                        </div>
                        <div class="w-1/3 mb-4 mr-4">
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone Number</label>
                            <input value="" type="number" name="phone" id="phone"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Phone Number">
                            @error('phone')
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    <span class="font-medium"></span>
                                </div>
                            @enderror
                        </div>
                        <div class="w-1/3 mb-4 mr-4">
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                            <input value="" type="text" name="address" id="address"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Address">
                            @error('address')
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    <span class="font-medium"></span>
                                </div>
                            @enderror
                        </div>
                        <div class="w-1/3 mb-4 mr-4">
                            <label for="customer_group" class="block mb-2 text-sm font-medium text-gray-900">Select any
                                Group</label>
                            <select id="customer_group" name="customer_group"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="" selected>Select</option>
                            </select>
                            @error('customer_group')
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    <span class="font-medium"></span>
                                </div>
                            @enderror
                        </div>
                        <div class="w-1/3 mb-4 mr-4">
                            <label for="tin" class="block mb-2 text-sm font-medium text-gray-900">TIN</label>
                            <input value="" type="number" name="tin" id="tin"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="TIN">
                            @error('tin')
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    <span class="font-medium"></span>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg">Add
                        Customer</button>
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
                                    Full name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Company
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Phone
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Address
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