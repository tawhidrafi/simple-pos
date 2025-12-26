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
    <x-layout.popup />

    <!-- Top Bar -->
    <x-layout.top-bar />

    <!-- Sidebar -->
    <x-layout.sidebar />

    <!-- Main Content Area -->
    <main class="pt-24 flex-1">
        <div class="container mx-auto max-w-screen-xl px-4 xl:px-0">
            @yield('content')
        </div>
    </main>

    <!-- Optional Modal Section -->
    @yield('modal')

    <!-- Footer -->
    <x-layout.footer />

    @stack('scripts')
</body>

</html>