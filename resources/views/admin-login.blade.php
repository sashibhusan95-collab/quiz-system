<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-gray-100 via-white to-gray-200 min-h-screen flex flex-col">
    <x-user-navbar></x-user-navbar>

    <div class="flex flex-1 items-center justify-center px-4 py-12">
        <div class="relative bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md border border-gray-200">
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-green-600 to-blue-600 text-white px-6 py-2 rounded-full shadow-md text-sm font-semibold tracking-wide">
                Admin Panel
            </div>

            <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600 mb-2 text-center">
                Welcome Back
            </h2>

            @error('user')
                <div class="text-red-500 text-center mb-3">{{ $message }}</div>
            @enderror

            <form action="/admin-login" method="post" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm text-gray-600 mb-2">Admin Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        placeholder="Enter admin name"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 placeholder-gray-400 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent transition duration-200"
                    >
                    @error('name')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm text-gray-600 mb-2">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="Enter password"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 placeholder-gray-400 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent transition duration-200"
                    >
                    @error('password')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button 
                    type="submit"
                    class="w-full bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 text-white font-semibold py-3 px-4 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 mt-6"
                >
                    Login
                </button>
            </form>

            <div class="text-center mt-6 text-sm text-gray-500">
                © {{ date('Y') }} Admin Portal. All Rights Reserved.
            </div>
        </div>
    </div>

    <x-footer-user></x-footer-user>
</body>
</html>
