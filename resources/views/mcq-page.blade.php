<!DOCTYPE html>
<html lang="en">
<head>
    <title>MCQ Page</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-blue-50 via-green-50 to-blue-100 min-h-screen">
    <x-user-navbar></x-user-navbar>
    
    <div class="flex flex-col items-center min-h-screen py-8 px-4">
        <!-- Header Section -->
        <div class="w-full max-w-4xl mb-8">
            <div class="bg-gradient-to-r from-green-600 to-blue-600 rounded-2xl shadow-xl p-8 text-white">
                <h1 class="text-3xl font-bold text-center mb-3">{{$quizName}}</h1>
                <div class="flex justify-center items-center gap-8 mt-6">
                    <div class="text-center">
                        <p class="text-sm opacity-90 mb-1">Total Questions</p>
                        <p class="text-2xl font-bold">{{session('currentQuiz')['totalMcq']}}</p>
                    </div>
                    <div class="h-12 w-px bg-white opacity-30"></div>
                    <div class="text-center">
                        <p class="text-sm opacity-90 mb-1">Current Progress</p>
                        <p class="text-2xl font-bold">{{session('currentQuiz')['currentMcq']}} / {{session('currentQuiz')['totalMcq']}}</p>
                    </div>
                </div>
                
                <!-- Progress Bar -->
                <!-- <div class="mt-6 bg-white bg-opacity-20 rounded-full h-3 overflow-hidden">
                    <div class="bg-white h-full rounded-full transition-all duration-500" 
                         style="width: {{ (session('currentQuiz')['currentMcq'] / session('currentQuiz')['totalMcq']) * 100 }}%">
                    </div>
                </div> -->
            </div>
        </div>

        <!-- Question Card -->
        <div class="w-full max-w-4xl">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border-t-4 border-green-500">
                <!-- Question Header -->
                <div class="bg-gradient-to-r from-green-50 to-blue-50 p-6 border-b border-gray-200">
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-green-500 to-blue-500 rounded-lg flex items-center justify-center text-white font-bold">
                            Q
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 leading-relaxed">{{$mcqData->question}}</h3>
                    </div>
                </div>

                <!-- Options Form -->
                <form action="/submit-next/{{$mcqData->id}}" method="post" class="p-6">
                    @csrf
                    <input type="hidden" name="id" value="{{$mcqData->id}}">
                    
                    <div class="space-y-4">
                        <!-- Option A -->
                        <label class="group flex items-start gap-4 p-5 border-2 border-gray-200 rounded-xl cursor-pointer transition-all duration-200 hover:border-green-400 hover:bg-green-50 hover:shadow-md" for="option_1">
                            <input id="option_1" class="mt-1 w-5 h-5 text-green-600 focus:ring-2 focus:ring-green-500" type="radio" value="a" name="option">
                            <div class="flex-1">
                                <span class="flex items-center gap-2">
                                    <span class="font-semibold text-blue-600">A.</span>
                                    <span class="text-gray-700 group-hover:text-gray-900">{{$mcqData->a}}</span>
                                </span>
                            </div>
                        </label>

                        <!-- Option B -->
                        <label class="group flex items-start gap-4 p-5 border-2 border-gray-200 rounded-xl cursor-pointer transition-all duration-200 hover:border-green-400 hover:bg-green-50 hover:shadow-md" for="option_2">
                            <input id="option_2" class="mt-1 w-5 h-5 text-green-600 focus:ring-2 focus:ring-green-500" type="radio" value="b" name="option">
                            <div class="flex-1">
                                <span class="flex items-center gap-2">
                                    <span class="font-semibold text-blue-600">B.</span>
                                    <span class="text-gray-700 group-hover:text-gray-900">{{$mcqData->b}}</span>
                                </span>
                            </div>
                        </label>

                        <!-- Option C -->
                        <label class="group flex items-start gap-4 p-5 border-2 border-gray-200 rounded-xl cursor-pointer transition-all duration-200 hover:border-green-400 hover:bg-green-50 hover:shadow-md" for="option_3">
                            <input id="option_3" class="mt-1 w-5 h-5 text-green-600 focus:ring-2 focus:ring-green-500" type="radio" value="c" name="option">
                            <div class="flex-1">
                                <span class="flex items-center gap-2">
                                    <span class="font-semibold text-blue-600">C.</span>
                                    <span class="text-gray-700 group-hover:text-gray-900">{{$mcqData->c}}</span>
                                </span>
                            </div>
                        </label>

                        <!-- Option D -->
                        <label class="group flex items-start gap-4 p-5 border-2 border-gray-200 rounded-xl cursor-pointer transition-all duration-200 hover:border-green-400 hover:bg-green-50 hover:shadow-md" for="option_4">
                            <input id="option_4" class="mt-1 w-5 h-5 text-green-600 focus:ring-2 focus:ring-green-500" type="radio" value="d" name="option">
                            <div class="flex-1">
                                <span class="flex items-center gap-2">
                                    <span class="font-semibold text-blue-600">D.</span>
                                    <span class="text-gray-700 group-hover:text-gray-900">{{$mcqData->d}}</span>
                                </span>
                            </div>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="mt-8 w-full bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 text-white font-semibold py-4 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                        Submit Answer & Continue
                    </button>
                </form>
            </div>
        </div>
    </div>

    <x-footer-user></x-footer-user>
</body>
</html>