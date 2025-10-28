<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quiz Results</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-blue-50 via-green-50 to-blue-100 min-h-screen">
    <x-user-navbar></x-user-navbar>
    
    <div class="flex flex-col min-h-screen items-center py-8 px-4">
        <!-- Page Title -->
        <h1 class="text-4xl font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent mb-8">
            Quiz Results
        </h1>

        <div class="w-full max-w-6xl">
            <!-- Score Card -->
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden mb-8 border-t-4 border-green-500">
                <div class="bg-gradient-to-r from-green-600 to-blue-600 p-8 text-white">
                    <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                        <!-- Score Display -->
                        <div class="text-center md:text-left">
                            <p class="text-sm opacity-90 mb-2">Your Score</p>
                            <p class="text-5xl font-bold">
                                {{$correctAnswers}}<span class="text-2xl opacity-90">/{{count($resultData)}}</span>
                            </p>
                            <p class="text-lg mt-2 opacity-90">
                                {{ round(($correctAnswers*100/count($resultData)), 1) }}% Correct
                            </p>
                        </div>

                        <!-- Performance Indicator -->
                        <div class="flex flex-col items-center">
                            @php
                                $percentage = ($correctAnswers*100/count($resultData));
                            @endphp
                            
                            @if($percentage >= 70)
                                <div class="w-24 h-24 bg-white bg-opacity-20 rounded-full flex items-center justify-center mb-3">
                                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-xl font-semibold">Excellent!</p>
                            @elseif($percentage >= 50)
                                <div class="w-24 h-24 bg-white bg-opacity-20 rounded-full flex items-center justify-center mb-3">
                                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-xl font-semibold">Good Job!</p>
                            @else
                                <div class="w-24 h-24 bg-white bg-opacity-20 rounded-full flex items-center justify-center mb-3">
                                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-xl font-semibold">Keep Practicing!</p>
                            @endif
                        </div>

                        <!-- Progress Circle -->
                        <div class="relative w-32 h-32">
                            <svg class="transform -rotate-90 w-32 h-32">
                                <circle cx="64" cy="64" r="56" stroke="rgba(255,255,255,0.2)" stroke-width="8" fill="none" />
                                <circle cx="64" cy="64" r="56" stroke="white" stroke-width="8" fill="none"
                                    stroke-dasharray="{{ 2 * 3.14159 * 56 }}"
                                    stroke-dashoffset="{{ 2 * 3.14159 * 56 * (1 - $percentage/100) }}"
                                    stroke-linecap="round" />
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="text-2xl font-bold">{{ round($percentage) }}%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Certificate Link -->
                @if($correctAnswers*100/count($resultData) > 70)
                <div class="bg-gradient-to-r from-green-50 to-blue-50 p-6 border-b border-gray-200">
                    <a href="/certificate" class="flex items-center justify-center gap-3 bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 text-white font-semibold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 w-full md:w-auto md:mx-auto">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                        View & Download Certificate
                    </a>
                </div>
                @endif
            </div>

            <!-- Results Table -->
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                <!-- Table Header -->
                <div class="bg-gradient-to-r from-green-600 to-blue-600 px-6 py-4">
                    <h2 class="text-xl font-semibold text-white">Detailed Results</h2>
                </div>

                <!-- Table Content -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gradient-to-r from-green-50 to-blue-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 w-20">S. No</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Question</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 w-32">Result</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($resultData as $key=>$item)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 text-gray-600 font-medium">{{$key+1}}</td>
                                <td class="px-6 py-4 text-gray-800">{{$item->question}}</td>
                                <td class="px-6 py-4 text-center">
                                    @if($item->is_correct)
                                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-700">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Correct
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-sm font-semibold bg-red-100 text-red-700">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                            Incorrect
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-footer-user></x-footer-user>
</body>
</html>