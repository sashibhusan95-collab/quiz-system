<!DOCTYPE html>
<html lang="en">
<head>
    <title>Category : {{str_replace('-',' ',$category)}}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-gray-100 via-white to-gray-100 min-h-screen flex flex-col">
    <x-user-navbar></x-user-navbar>

    <div class="flex flex-col items-center px-4 py-10 flex-1">
        <h2 class="text-3xl font-bold text-blue-700 mb-8">
            Category: <span class="text-gray-800">{{str_replace('-',' ',$category)}}</span>
        </h2>

        {{-- Error message --}}
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 w-full max-w-3xl text-center">
                {{ session('error') }}
            </div>
        @endif

        {{-- Quiz List --}}
        <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">
            <div class="bg-gradient-to-r from-green-600 to-blue-600 px-6 py-3 text-2xl font-bold text-white">
                Available Quizzes
            </div>

            <div class="divide-y divide-gray-200">
                {{-- Table Header --}}
                <div class="grid grid-cols-4 text-center py-3 bg-gray-50 font-semibold text-gray-700">
                    <div>Quiz ID</div>
                    <div>Quiz Name</div>
                    <div>MCQ Count</div>
                    <div>Action</div>
                </div>

                {{-- Quiz Rows --}}
                @forelse($quizData as $item)
                    <div class="grid grid-cols-4 text-center items-center py-2 hover:bg-blue-50 transition duration-200">
                        <div class="text-gray-700 font-medium">{{ $item->id }}</div>
                        <div class="text-gray-800 font-semibold">{{ $item->name }}</div>
                        <div class="text-gray-600">{{ $item->mcq_count }}</div>
                        <div>
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

    <x-footer-user></x-footer-user>
</body>
</html>




