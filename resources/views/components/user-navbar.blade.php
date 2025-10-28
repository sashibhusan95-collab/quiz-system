<nav class="bg-gradient-to-r from-green-50 to-blue-50 shadow-lg border-b border-green-100">
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo/Brand -->
            <div class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-gradient-to-br from-green-600 to-blue-600 rounded-lg flex items-center justify-center shadow-md">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <a href="/" class="text-2xl font-bold bg-gradient-to-r from-green-700 to-blue-700 bg-clip-text text-transparent hover:from-green-600 hover:to-blue-600 transition-all duration-300">
                    Quiz System
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-1">
                <a href="/" class="px-4 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all duration-200 font-medium">
                    Home
                </a>
                <a href="/categories-list" class="px-4 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all duration-200 font-medium">
                    Categories
                </a>
                <a href="/user-blog" class="px-4 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all duration-200 font-medium">
                    Blog
                </a>

                @if(session('user'))
                    <!-- User Dropdown Menu -->
                    <div class="relative group ml-4">
                        <button class="flex items-center space-x-2 px-4 py-2 bg-white hover:bg-gray-50 rounded-lg shadow-sm border border-gray-200 transition-all duration-200">
                            <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-blue-500 rounded-full flex items-center justify-center text-white font-semibold">
                                {{strtoupper(substr(session('user')->name, 0, 1))}}
                            </div>
                            <span class="text-gray-700 font-medium">{{session('user')->name}}</span>
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <a href="/user-logout" class="block px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors duration-150 font-medium">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    <span>Logout</span>
                                </div>
                            </a>
                            <a href="/user-details" class="block px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg transition-colors duration-150 font-medium">
                                <div class="flex items-center space-x-2">
                                    <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M200-246q54-53 125.5-83.5T480-360q83 0 154.5 30.5T760-246v-514H200v514Zm280-194q58 0 99-41t41-99q0-58-41-99t-99-41q-58 0-99 41t-41 99q0 58 41 99t99 41ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm69-80h422q-44-39-99.5-59.5T480-280q-56 0-112.5 20.5T269-200Zm211-320q-25 0-42.5-17.5T420-580q0-25 17.5-42.5T480-640q25 0 42.5 17.5T540-580q0 25-17.5 42.5T480-520Zm0 17Z"/></svg>
                                    <span>User Details</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @else
                    <!-- Auth Buttons -->
                    <div class="flex items-center space-x-3 ml-4">
                        <a href="/user-login" class="px-5 py-2 text-green-700 hover:text-green-800 font-medium transition-colors duration-200">
                            Login
                        </a>
                        <a href="/user-signup" class="px-5 py-2 bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-200">
                            Sign Up
                        </a>
                    </div>
                @endif
            </div>

            <!-- Mobile Menu Button -->
            <button class="md:hidden p-2 text-gray-700 hover:bg-gray-100 rounded-lg" onclick="toggleMobileMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden mt-4 pb-2 space-y-2">
            <a href="/" class="block px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg transition-colors duration-150 font-medium">
                Home
            </a>
            <a href="/admin-categories" class="block px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg transition-colors duration-150 font-medium">
                Categories
            </a>
            <a href="/admin-logout" class="block px-4 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg transition-colors duration-150 font-medium">
                Blog
            </a>

            @if(session('user'))
                <div class="px-4 py-3 bg-white rounded-lg border border-gray-200">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-blue-500 rounded-full flex items-center justify-center text-white font-semibold">
                            {{strtoupper(substr(session('user')->name, 0, 1))}}
                        </div>
                        <span class="text-gray-700 font-medium">{{session('user')->name}}</span>
                    </div>
                    <a href="/user-logout" class="block px-4 py-2 bg-red-50 text-red-600 hover:bg-red-100 rounded-lg transition-colors duration-150 font-medium text-center">
                        Logout
                    </a>
                </div>
            @else
                <div class="space-y-2 pt-2">
                    <a href="/user-login" class="block px-4 py-3 text-center text-green-700 hover:bg-green-50 rounded-lg transition-colors duration-150 font-medium border border-green-200">
                        Login
                    </a>
                    <a href="/user-signup" class="block px-4 py-3 text-center bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-lg shadow-md hover:shadow-lg transition-all duration-200 font-medium">
                        Sign Up
                    </a>
                </div>
            @endif
        </div>
    </div>
</nav>

<script>
function toggleMobileMenu() {
    const menu = document.getElementById('mobileMenu');
    menu.classList.toggle('hidden');
}
</script>