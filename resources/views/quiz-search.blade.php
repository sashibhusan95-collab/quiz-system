<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Categories Page</title>
    @vite('resources/css/app.css')
</head>
<body class=" bg-gray-50">
    <x-user-navbar></x-user-navbar>
    
    <div class="flex flex-col items-center min-h-screen py-8 px-4">
        <!-- Search Header -->
        <div class="w-full max-w-6xl mb-8">
            <div class="bg-gradient-to-r from-green-600 to-blue-600 rounded-2xl shadow-xl p-8 text-white">
                <div class="flex items-center justify-center gap-3 mb-2">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <h2 class="text-3xl font-bold">Search Results</h2>
                </div>
                <p class="text-center text-xl opacity-90">
                    Showing quizzes for: <span class="font-semibold">"{{$quiz}}"</span>
                </p>
            </div>
        </div>

        <!-- Error Messages -->
        @if(isset($message))
        <div class="w-full max-w-6xl mb-6">
            <div class="bg-red-50 border-l-4 border-red-500 rounded-lg p-4 shadow-md">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-red-700 font-medium">{{ $message }}</p>
                </div>
            </div>
        </div>
        @endif

        @if (session('error'))
        <div class="w-full max-w-6xl mb-6">
            <div class="bg-red-50 border-l-4 border-red-500 rounded-lg p-4 shadow-md">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-red-700 font-medium">{{ session('error') }}</p>
                </div>
            </div>
        </div>
        @endif

        <!-- Quiz Results Count -->
        @if(count($quizData) > 0)
        <div class="w-full max-w-6xl mb-6">
            <div class="bg-white rounded-xl shadow-md p-4 border-l-4 border-green-500">
                <p class="text-gray-700">
                    <span class="font-semibold text-green-600">{{ count($quizData) }}</span> 
                    {{ count($quizData) == 1 ? 'quiz' : 'quizzes' }} found
                </p>
            </div>
        </div>
        @endif

        <!-- Quiz Table -->
        <div class="w-full max-w-6xl">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                <!-- Table Header -->
                <div class="bg-gradient-to-r from-green-600 to-blue-600 px-6 py-4">
                    <h3 class="text-xl font-semibold text-white">Available Quizzes</h3>
                </div>

                <!-- Table Content -->
                @if(count($quizData) > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gradient-to-r from-green-50 to-blue-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 w-24">Quiz ID</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Quiz Name</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 w-32">Questions</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 w-40">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($quizData as $item)
                            <tr class="hover:bg-gradient-to-r hover:from-green-50 hover:to-blue-50 transition-all duration-200">
                                <!-- Quiz ID -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-green-100 to-blue-100 rounded-lg">
                                        <span class="text-gray-700 font-bold">#{{$item->id}}</span>
                                    </div>
                                </td>
                                
                                <!-- Quiz Name -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-green-500 to-blue-500 rounded-lg flex items-center justify-center text-white font-bold">
                                            Q
                                        </div>
                                        <div>
                                            <p class="text-gray-800 font-semibold">{{$item->name}}</p>
                                            <p class="text-gray-500 text-sm">Quiz ID: {{$item->id}}</p>
                                        </div>
                                    </div>
                                </td>
                                
                                <!-- MCQ Count -->
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-sm font-semibold bg-blue-100 text-blue-700">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                        </svg>
                                        {{$item->mcq_count}}
                                    </span>
                                </td>
                                
                                <!-- Action Button -->
                                <td class="px-6 py-4 text-center">
                                    <a href="/start-quiz/{{$item->id}}/{{str_replace(' ','-',$item->name)}}" 
                                       class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Start Quiz
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <!-- Empty State -->
                <div class="flex flex-col items-center justify-center py-16 px-4">
                    <div class="bg-gradient-to-br from-green-100 to-blue-100 rounded-full p-6 mb-4">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">No Quizzes Found</h3>
                    <p class="text-gray-500 text-center">We couldn't find any quizzes matching "{{$quiz}}"</p>
                    <p class="text-gray-500 text-center mt-1">Try searching with different keywords</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <x-footer-user></x-footer-user>
</body>
</html>