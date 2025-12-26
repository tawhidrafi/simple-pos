<header class="bg-gray-800 text-white p-4 fixed w-full z-10 flex items-center">
    <div class="container mx-auto max-w-screen-xl flex items-center justify-between">
        <!-- Left Section: Logo, Side Menu Button, POS URL Button -->
        <div class="flex items-center space-x-4">
            <!-- Logo -->
            <div class="text-lg font-semibold">Logo</div>

            <!-- Side Menu Button -->
            <button id="open-sidebar" class="text-white focus:outline-none">
                <i class="fa-solid fa-bars"></i>
            </button>
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
                <a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-gray-200">Profile</a>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-200">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>