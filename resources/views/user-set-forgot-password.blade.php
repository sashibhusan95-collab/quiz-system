<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Signup</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-green-50 to-blue-50">
    <x-user-navbar></x-user-navbar>
    
    <div class="flex items-center justify-center min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-8 sm:p-10 rounded-3xl shadow-2xl w-full max-w-md transform transition-all hover:shadow-3xl">
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600 mb-2">
                    User Set Password
                </h2>
                <p class="text-gray-500 text-sm">Join us and start your journey</p>
            </div>

            <!-- General Error Message -->
            @error('user')
            <div class="mb-4 p-3 bg-red-50 border-l-4 border-red-500 rounded-lg">
                <p class="text-red-700 text-sm font-medium">{{$message}}</p>
            </div>
            @enderror

            <form action="/user-set-forgot-password" method="post" class="space-y-5">
                @csrf
                

                <!-- Email Field -->
                <div>
                    
                    <input 
                        type="hidden"
                        value="{{$email}}"
                        id="email"
                        placeholder="Enter your email" 
                        name="email"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-100 transition-all duration-300 text-gray-700">
                    @error('email')
                    <div class="mt-2 flex items-center space-x-1 text-red-600 text-sm">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{$message}}</span>
                    </div>
                    @enderror
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                    <input 
                        type="password"
                        id="password"
                        placeholder="Create a strong password" 
                        name="password"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-100 transition-all duration-300 text-gray-700">
                    @error('password')
                    <div class="mt-2 flex items-center space-x-1 text-red-600 text-sm">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{$message}}</span>
                    </div>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Confirm Password</label>
                    <input 
                        type="password"
                        id="password_confirmation"
                        placeholder="Re-enter your password" 
                        name="password_confirmation"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-100 transition-all duration-300 text-gray-700">
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 text-white font-semibold py-3 px-4 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 mt-6">
                    Update Password
                </button>
            </form>

            <!-- Login Link -->
            <div class="mt-6 text-center">
                <p class="text-gray-600 text-sm">
                    Already have an account? 
                    <a href="/user-login" class="text-green-600 hover:text-green-700 font-semibold hover:underline transition-colors duration-300">
                        Sign In
                    </a>
                </p>
            </div>
        </div>
    </div>
    
    <x-footer-user></x-footer-user>
</body>
</html>
