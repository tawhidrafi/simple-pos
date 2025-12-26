<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Simple POS')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
    <!-- Alert Popup -->
    @if(session('alert'))
    <div
        id="alert-popup"
        class="fixed top-20 right-0 transform translate-x-full flex items-center p-4 mb-4 text-green-600 rounded-lg bg-green-200 w-max transition-transform duration-500 z-20"
        role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <div class="ms-3 text-sm font-medium mr-20">
            {{ session('alert') ?? 'Alert Message' }}
        </div>
        <button type="button" id="close-alert" class="ms-auto -mx-1.5 -my-1.5 hover:bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 bg-green-200 inline-flex items-center justify-center h-8 w-8" aria-label="Close">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endif

    <!-- Top Bar -->
    <header
        class="bg-gray-800 text-white p-4 fixed w-full z-10 flex items-center">
        <div class="container mx-auto flex items-center justify-between">
            <!-- Left Section: Logo, Side Menu Button, POS URL Button -->
            <div class="flex items-center space-x-4">
                <!-- Logo -->
                <div>Logo</div>

                <!-- Side Menu Button -->
                <button id="open-sidebar" class="text-white focus:outline-none">
                    <i class="fa-solid fa-bars"></i>
                </button>

                <!-- POS URL Button -->
                <a href="/pos" class="text-white font-semibold hover:underline">
                    POS
                </a>
            </div>

            <!-- Middle Section: Dynamic Title -->
            <div class="text-center">
                <h1 class="text-lg font-bold">@yield('page-title', 'Page Title')</h1>
            </div>

            <!-- Right Section: User Info with Dropdown -->
            <div class="relative">
                <!-- Username Button -->
                <button id="user-menu-button" class="text-white flex items-center focus:outline-none gap-2">
                    <span>{{ Auth::check() ? Auth::user()->name : 'Username' }}</span>
                    <i class="fa-solid fa-caret-down"></i>
                </button>

                <!-- Dropdown Menu -->
                <div id="user-menu" class="transition-opacity duration-200 opacity-0 transform scale-95 hidden absolute right-0 mt-2 w-40 bg-white text-black rounded shadow-lg">
                    <a href="#" class="block px-4 py-2 hover:bg-gray-200">Profile</a>
                    <form action="#" method="POST">
                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-200">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <div
        id="sidebar"
        class="fixed inset-y-0 left-0 w-64 bg-gray-800 text-white p-6 transform -translate-x-full transition-transform duration-300 z-20">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold">Menu</h2>
            <button id="close-sidebar" class="text-white focus:outline-none">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <nav>
            <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Dashboard</a>
            <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">User Management</a>

            <!-- Contact Dropdown -->
            <div>
                <button class="flex justify-between w-full py-2 px-4 text-left hover:bg-gray-700 rounded" id="contact-dropdown" aria-expanded="false">
                    Contact
                    <i class="fa-solid fa-caret-down"></i>
                </button>
                <div id="contact-menu" class="pl-6 hidden">
                    <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Customers</a>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Suppliers</a>
                </div>
            </div>

            <!-- Product Dropdown -->
            <div>
                <button class="flex justify-between w-full py-2 px-4 text-left hover:bg-gray-700 rounded" id="product-dropdown" aria-expanded="false">
                    Product
                    <i class="fa-solid fa-caret-down"></i>
                </button>
                <div id="product-menu" class="pl-6 hidden">
                    <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Inventory</a>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">All Products</a>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Brand</a>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Category</a>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Unit</a>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Adjustment</a>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Price Management</a>
                </div>
            </div>

            <!-- POS Dropdown -->
            <div>
                <button class="flex justify-between w-full py-2 px-4 text-left hover:bg-gray-700 rounded" id="pos-dropdown" aria-expanded="false">
                    POS
                    <i class="fa-solid fa-caret-down"></i>
                </button>
                <div id="pos-menu" class="pl-6 hidden">
                    <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Purchase</a>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Sale</a>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Adjustments</a>
                </div>
            </div>

            <!-- Accounting Dropdown -->
            <div>
                <button class="flex justify-between w-full py-2 px-4 text-left hover:bg-gray-700 rounded" id="accounting-dropdown" aria-expanded="false">
                    Accounting
                    <i class="fa-solid fa-caret-down"></i>
                </button>
                <div id="accounting-menu" class="pl-6 hidden">
                    <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Account</a>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Deposit</a>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Expense</a>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Expense Categories</a>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Payment Methods</a>
                </div>

                <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Settings</a>
                <a href="#" class="block py-2 px-4 hover:bg-gray-700 rounded">Reports</a>
            </div>
        </nav>
    </div>


    <!-- Main Content Area -->
    <main
        class="pt-16 flex-1">
        <div class="container mx-auto py-4">
            @yield('content')

            <!-- Modal toggle -->
            <button
                data-modal-target="crud-modal"
                data-modal-toggle="crud-modal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                type="button">
                Toggle modal
            </button>

            <!-- Main modal -->
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
                                Create New Product
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
                                <span
                                    class="sr-only">
                                    Close modal
                                </span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form
                            class="p-4 md:p-5"
                            method="POST"
                            action=""
                            enctype="multipart/form-data">
                            <div
                                class="grid gap-4 mb-4 grid-cols-2">
                                <div
                                    class="col-span-2">
                                    <label
                                        for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900">
                                        Name
                                    </label>
                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                        placeholder="Type product name"
                                        required="">
                                </div>
                                <div
                                    class="col-span-2 sm:col-span-1">
                                    <label
                                        for="price"
                                        class="block mb-2 text-sm font-medium text-gray-900">
                                        Price
                                    </label>
                                    <input
                                        type="number"
                                        name="price"
                                        id="price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                        placeholder="$2999"
                                        required="">
                                </div>
                                <div
                                    class="col-span-2 sm:col-span-1">
                                    <label
                                        for="category"
                                        class="block mb-2 text-sm font-medium text-gray-900">
                                        Category
                                    </label>
                                    <select
                                        id="category"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <option selected="">Select category</option>
                                        <option value="TV">TV/Monitors</option>
                                        <option value="PC">PC</option>
                                        <option value="GA">Gaming/Console</option>
                                        <option value="PH">Phones</option>
                                    </select>
                                </div>
                            </div>
                            <button
                                type="submit"
                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Add new product
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- MAIN CONTENT AREA END -->
        </div>
    </main>

    <!-- Footer -->
    <footer
        class="bg-gray-800 text-white py-2">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} All rights reserved. Simple POS System developed by Rafi Uddin</p>
        </div>
    </footer>
</body>

</html>

@extends('layouts.mainLayout')

@section('title', 'User Profile')

@section('content')

<div class="flex flex-wrap">
    <!-- Left Panel -->
    <div class="w-full md:w-1/3 p-4">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-center mb-4">
                <img class="rounded-full w-24 h-24" src="{{ Auth::user()->photo ?? '/files/avatar.png' }}" alt="User Image">
            </div>
            <div class="text-center">
                <h2 class="text-xl font-semibold mb-2">{{ Auth::user()->name ?? 'John Smith' }}</h2>
                <p class="text-gray-600 mb-4">{{ Auth::user()->role ?? 'Role' }}</p>
                <div class="flex justify-center space-x-4">
                    <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Panel -->
    <div class="w-full md:w-2/3 p-4">
        <!-- User Information -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-600">Email Address</p>
                    <p class="text-black">{{ Auth::user()->email ?? 'someone@mail.com' }}</p>
                </div>
                <div>
                    <p class="text-gray-600">Phone Number</p>
                    <p class="text-black">{{ Auth::user()->phone ?? '01234 567891' }}1</p>
                </div>
                <div>
                    <p class="text-gray-600">Address</p>
                    <p class="text-black">{{ Auth::user()->address ?? '121/B, Bay Street, London' }}</p>
                </div>
            </div>
        </div>

        <!-- Project Status -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Last Activity</h3>
            <div>
                <p class="mb-2 text-gray-600">Title</p>
                <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: 70%"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection