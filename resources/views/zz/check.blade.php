<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-400">
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-2xl">
            <h2 class="text-xl font-semibold mb-6">Profile</h2>
            <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                <!-- Profile Image -->
                <div class="relative w-20 h-20">
                    <div class="w-full h-full bg-blue-500 text-white flex items-center justify-center text-xl font-bold rounded-full">
                        Photo
                    </div>
                </div>
                <!-- Profile Info -->
                <div class="flex-1 space-y-4">
                    <!-- Name -->
                    <div>
                        <p class="text-sm font-medium text-gray-700">
                            Name
                        </p>
                        <p class="mt-1 text-gray-800">Jane Doe</p>
                    </div>
                    <!-- Email -->
                    <div>
                        <p class="text-sm font-medium text-gray-700">
                            Email
                        </p>
                        <p class="mt-1 text-gray-800">purchase-manager@pos.com</p>
                    </div>
                    <!-- Phone Number -->
                    <div>
                        <p class="text-sm font-medium text-gray-700">
                            Phone Number
                        </p>
                        <p class="mt-1 text-gray-800">78787889988</p>
                    </div>
                    <!-- Address -->
                    <div>
                        <p class="text-sm font-medium text-gray-700">
                            Address
                        </p>
                        <p class="mt-1 text-gray-800">221/B baker street</p>
                    </div>
                    <!-- Role -->
                    <div>
                        <p class="text-sm font-medium text-gray-700">
                            Role
                        </p>
                        <p class="mt-1 text-gray-800">Sales Man</p>
                    </div>
                </div>
            </div>
            <!-- Edit Profile Button -->
            <div class="mt-6 flex justify-end">
                <button
                    type="button"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Edit Profile
                </button>
            </div>
        </div>

    </div>
</body>

</html>