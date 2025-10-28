<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quiz System Home Page</title>
    @vite('resources/css/app.css')
</head>
<body class=" bg-gray-50">
    <x-user-navbar></x-user-navbar>
    
    <div class="min-h-screen py-8 px-4 sm:px-6 lg:px-8">
        <!-- registered successful message -->
    @if(session('message-success'))
    <div id="success-popup"
         class="fixed top-5 right-5 bg-green-500 text-white font-semibold px-6 py-3 rounded-lg shadow-lg z-50 transition-opacity duration-500 opacity-0">
        {{ session('message-success') }}
    </div>

    <script>
        // Show popup smoothly
        const popup = document.getElementById('success-popup');
        popup.style.opacity = 1;

        // Hide popup after 3 seconds
        setTimeout(() => {
            popup.style.opacity = 0;
        }, 3000);
    </script>
     @endif
        <div class="max-w-5xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-10">
                <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-blue-600 mb-3">
                    Check Your Skills
                </h1>
                <p class="text-gray-600 text-lg">Explore quizzes and test your knowledge</p>
            </div>

            <!-- Search Bar -->
            <div class="mb-12 max-w-2xl mx-auto">
                <div class="relative">
                    <form action="search-quiz" method="get">
                        <input 
                        class="w-full px-6 py-4 text-gray-700 bg-white border-2 border-gray-200 rounded-full shadow-lg focus:outline-none focus:border-green-500 focus:ring-4 focus:ring-green-100 transition-all duration-300" 
                        type="text"
                        name="search" 
                        placeholder="Search for a quiz category...">
                    <button class="absolute right-3 top-1/2 transform -translate-y-1/2 bg-green-600 hover:bg-green-700 text-white p-3 rounded-full transition-all duration-300 shadow-md hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="currentColor">
                            <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/>
                        </svg>
                    </button>
                    </form>
                </div>
            </div>

            <!-- Category List -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-green-600 to-blue-600 px-6 py-3">
                    <h2 class="text-2xl font-bold text-white text-center">Top 5 Quiz Categories</h2>
                </div>

                <!-- Table Header -->
                <div class="hidden md:block bg-gray-50 border-b border-gray-200">
                    <div class="grid grid-cols-12 gap-4 px-6 py-3 font-semibold text-gray-700 text-sm uppercase tracking-wide">
                        <div class="col-span-1">#</div>
                        <div class="col-span-6">Category Name</div>
                        <div class="col-span-3">Quiz Count</div>
                        <div class="col-span-2 text-center">Action</div>
                    </div>
                </div>

                <!-- Table Body -->
                <div class="divide-y divide-gray-100">
                    @foreach($categories as $key=>$category)
                    <div class="hover:bg-green-50 transition-colors duration-200 px-6 py-3">
                        <div class="grid grid-cols-12 gap-4 items-center">
                            <!-- Serial Number -->
                            <div class="col-span-12 md:col-span-1">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-green-100 text-green-700 font-semibold text-sm md:w-auto md:h-auto md:bg-transparent">
                                    {{$key+1}}
                                </span>
                            </div>
                            
                            <!-- Category Name -->
                            <div class="col-span-12 md:col-span-6">
                                <h3 class="text-lg font-semibold text-gray-800">{{$category->name}}</h3>
                            </div>
                            
                            <!-- Quiz Count -->
                            <div class="col-span-6 md:col-span-3">
                                <div class="flex items-center space-x-2">
                                    <span class="md:hidden text-sm text-gray-500">Quizzes:</span>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                        {{$category->quizzes_count}} quiz{{ $category->quizzes_count != 1 ? 'zes' : '' }}
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Action Button -->
                            <div class="col-span-6 md:col-span-2 flex justify-end md:justify-center">
                                <a href="user-quiz-list/{{$category->id}}/{{str_replace(' ','-',$category->name)}}" 
                                   class="inline-flex items-center space-x-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="currentColor">
                                        <path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/>
                                    </svg>
                                    <span class="font-medium">View</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Empty State (if needed) -->
                @if($categories->isEmpty())
                <div class="px-6 py-16 text-center">
                    <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-1">No categories found</h3>
                    <p class="text-gray-500">Check back later for new quiz categories.</p>
                </div>
                @endif
            </div>
            <br>
            <br>    

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-green-600 to-blue-600 px-6 py-3">
                    <h2 class="text-2xl font-bold text-white text-center">Top 5 Quizzes</h2>
                </div>

            <div class="divide-y divide-gray-200">
                {{-- Table Header --}}
                <div class="grid grid-cols-2 text-center py-3 bg-gray-50 font-semibold text-gray-700">
                    <div >Quiz Name</div>
                    <div >Action</div>
                </div>

                {{-- Quiz Rows --}}
                @forelse($quizData as $item)
                    <div class="grid grid-cols-2 text-center items-center py-2 hover:bg-blue-50 transition duration-200">
                        <div class="text-gray-800 font-semibold w-150">{{ $item->name }}</div>
                        
                        <div >
                            <a 
                                href="/start-quiz/{{ $item->id }}/{{str_replace(' ','-',$item->name)}}" 
                               class="inline-flex items-center space-x-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5"
                            >
                                Start Quiz
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-6 text-gray-500 italic">
                        No quizzes found for this category.
                    </div>
                @endforelse
            </div>
        </div>
        </div>
    </div>

    <x-footer-user></x-footer-user>
</body>
</html>