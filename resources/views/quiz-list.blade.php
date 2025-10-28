<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Categories Page</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-blue-50 to-green-50">
    <x-navbar name={{$name}}></x-navbar>
    
    <div class="min-h-screen pt-8 px-4">
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6 border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800 mb-2">Quiz Management</h1>
                        <p class="text-lg text-gray-600">
                            Category: <span class="font-semibold text-green-600">{{$category}}</span>
                        </p>
                    </div>
                    <a href="/add-quiz" 
                       class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition duration-200 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Back to Quizzes
                    </a>
                </div>
            </div>

            <!-- Table Section -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Table Header -->
                <div class="bg-gradient-to-r from-green-600 to-blue-600 px-6 py-4">
                    <div class="flex justify-between items-center text-white font-semibold">
                        <div class="w-24">Quiz ID</div>
                        <div class="flex-1 px-4">Quiz Name</div>
                        <div class=" w-24 text-center flex-1">MCQ Count</div>
                        <div class="w-24 text-center">Actions</div>
                    </div>
                </div>

                <!-- Table Body -->
                <div class="divide-y divide-gray-200">
                    @foreach($quizData as $item)
                    <div class="px-6 py-4 hover:bg-blue-50 transition duration-150">
                        <div class="flex justify-between items-center">
                            <div class="w-24">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    #{{$item->id}}
                                </span>
                            </div>
                            <div class="flex-1 px-4">
                                <p class="text-gray-800 font-medium">{{$item->name}}</p>
                            </div>
                            <div class="flex-1 text-center">
                                <p class="text-gray-800 font-medium">{{ $item->mcq_count }}</p>
                            </div>
                            <div class="w-24 text-center">
                                <a href="/show-quiz/{{$item->id}}/{{$item->name}}" 
                                   class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 hover:bg-blue-600 hover:text-white text-blue-600 transition duration-200 group"
                                   title="View Quiz">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="currentColor">
                                        <path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Empty State -->
                @if(count($quizData) === 0)
                <div class="px-6 py-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No quizzes found</h3>
                    <p class="mt-1 text-sm text-gray-500">Get started by creating a new quiz.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>