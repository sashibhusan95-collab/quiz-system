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
        
        <!-- Navigation Links -->
        <div class="hidden md:flex items-center space-x-1">
            <a class="px-4 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all duration-200 font-medium" href="/dashboard">
                Dashboard
            </a>
            <a class="px-4 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all duration-200 font-medium" href="/admin-categories">
                Categories
            </a>
            <a class="px-4 py-2 text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all duration-200 font-medium" href="/add-quiz">
                Quiz
            </a>
            
            <!-- User Section -->
            <div class="ml-4 pl-4 border-l border-slate-700 flex items-center space-x-3">
                <div class="px-5 py-2 bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-200">
                    
                    <span class=" text-white font-medium">{{$name}}</span>
                </div>
                <a class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-all duration-200 font-medium shadow-md hover:shadow-lg" href="/admin-logout">
                    Logout
                </a>
            </div>
        </div>
</div>
    </div>
</nav>