<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login || POS</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        body {
            background: url('/files/background.jpg');
            background-size: cover;
        }

        /* Glassmorphism card effect */
        .card {
            backdrop-filter: blur(5px) saturate(150%);
            -webkit-backdrop-filter: blur(10px) saturate(150%);
            background-color: rgba(255, 255, 255, 0.4);
        }
    </style>
    <script>
        function fillEmail(role) {
            const emailField = document.getElementById('email');
            const passwordField = document.getElementById('password');
            const emails = {
                admin: "admin@mail.com",
                sales: "sales@mail.com",
                purchase: "purchase@mail.com"
            };
            const passwords = {
                admin: 123456789,
                sales: 987654321,
                purchase: 147258369
            }
            emailField.value = emails[role];
            passwordField.value = passwords[role];
        }
    </script>
</head>

<body>
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto min-h-screen">
        <div class="card w-full rounded-lg md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-center text-gray-900 md:text-2xl">
                    Sign in to your account
                </h1>
                <form class="space-y-4 md:space-y-6" action="/login" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">
                            Your email
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="name@company.com"
                            required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">
                            Password
                        </label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            required>
                    </div>
                    <div class="flex justify-between">
                        <button
                            type="button"
                            onclick="fillEmail('admin')"
                            class="bg-gray-200 text-gray-800 text-sm hover:bg-gray-300 rounded-lg px-2 py-1 mr-1">
                            Admin
                        </button>
                        <button
                            type="button"
                            onclick="fillEmail('sales')"
                            class="bg-gray-200 text-gray-800 text-sm hover:bg-gray-300 rounded-lg px-2 py-1 mr-1">
                            Sales Manager
                        </button>
                        <button
                            type="button"
                            onclick="fillEmail('purchase')"
                            class="bg-gray-200 text-gray-800 text-sm hover:bg-gray-300 rounded-lg px-4 py-2">
                            Purchase Manager
                        </button>
                    </div>
                    <button
                        type="submit"
                        class="mt-4 w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Sign in
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>