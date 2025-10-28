<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{str_replace('-',' ',$quizName)}}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
    <x-user-navbar></x-user-navbar>

    @if(session('message-success'))
    <div id="success-popup"
         class="fixed top-5 right-5 bg-white text-gray-800 font-medium px-6 py-4 rounded-lg shadow-xl z-50 transition-all duration-500 opacity-0 border-l-4 border-green-600">
        <div class="flex items-center gap-3">
            <div class="flex-shrink-0 w-5 h-5 bg-green-600 rounded-full flex items-center justify-center">
                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <span>{{ session('message-success') }}</span>
        </div>
    </div>

    <script>
        const popup = document.getElementById('success-popup');
        setTimeout(() => {
            popup.style.opacity = 1;
        }, 100);

        setTimeout(() => {
            popup.style.opacity = 0;
        }, 3500);
    </script>
    @endif

    <div class="min-h-screen py-12 px-4">
        <div class="max-w-5xl mx-auto">
            
            <!-- Breadcrumb -->
            <nav class="mb-8">
                <ol class="flex items-center space-x-2 text-sm text-gray-600">
                    <li><a href="/" class="hover:text-gray-900">Home</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li><a href="/quizzes" class="hover:text-gray-900">Quizzes</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li class="text-gray-900 font-medium">{{str_replace('-',' ',$quizName)}}</li>
                </ol>
            </nav>

            <!-- Main Content -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 shadow-3xl">
                
                <!-- Header -->
                <div class="border-b border-gray-200 px-8 py-8">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                    Assessment
                                </span>
                                <span class="text-sm text-gray-500">•</span>
                                <span class="text-sm text-gray-600">Multiple Choice</span>
                            </div>
                            <h1 class="text-3xl font-bold text-gray-900 mb-2 capitalize">
                                {{str_replace('-',' ',$quizName)}}
                            </h1>
                            <p class="text-gray-600">
                                Test your knowledge and track your progress with this comprehensive assessment.
                            </p>
                        </div>
                        <div class="flex-shrink-0 ml-6">
                            <div class="w-16 h-16 bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 rounded-lg flex items-center justify-center shadow-md">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quiz Details -->
                <div class="px-8 py-8">
                    <h2 class="text-lg font-semibold text-gray-900 mb-6">Quiz Overview</h2>
                    
                    <div class="grid md:grid-cols-3 gap-6 mb-8">
                        <!-- Questions -->
                        <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                            <div class="flex items-center gap-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-2xl font-bold text-gray-900">{{$quizCount}}</p>
                                    <p class="text-sm text-gray-600">Questions</p>
                                </div>
                            </div>
                        </div>

                        <!-- Attempts -->
                        <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                            <div class="flex items-center gap-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-2xl font-bold text-gray-900">Unlimited</p>
                                    <p class="text-sm text-gray-600">Attempts</p>
                                </div>
                            </div>
                        </div>

                        <!-- Format -->
                        <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                            <div class="flex items-center gap-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-2xl font-bold text-gray-900">MCQ</p>
                                    <p class="text-sm text-gray-600">Format</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Instructions -->
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-8">
                        <h3 class="text-base font-semibold text-gray-900 mb-3 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Instructions
                        </h3>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Read each question carefully before selecting your answer
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                You can retake this quiz multiple times to improve your score
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                Your progress will be saved automatically throughout the quiz
                            </li>
                        </ul>
                    </div>

                    <!-- Action Section -->
                    @if(session('user'))
                    <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                        <div class="text-sm text-gray-600">
                            <p>Ready to begin? Click the button to start your assessment.</p>
                        </div>
                        <a href="/mcq/{{session('firstMCQ')->id.'/'.$quizName}}" 
                           class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-green-600 to-blue-600  hover:from-green-700 hover:to-blue-700 text-white font-semibold px-8 py-3 rounded-lg transition-colors duration-200 shadow-sm">
                            <span>Start Quiz</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                    @else
                    <div class="pt-6 border-t border-gray-200">
                        <div class="bg-amber-50 border border-amber-200 rounded-lg p-6 mb-6">
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-amber-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                                <div>
                                    <h3 class="text-sm font-semibold text-gray-900 mb-1">Authentication Required</h3>
                                    <p class="text-sm text-gray-700">Please sign in or create an account to access this quiz and track your progress.</p>
                                </div>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-4">
                            <a href="/user-signup-quiz" 
                               class="flex items-center justify-center gap-2 bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                                <span>Create Account</span>
                            </a>

                            <a href="/user-login-quiz" 
                               class="flex items-center justify-center gap-2 bg-white hover:bg-gray-50 text-gray-900 font-semibold px-6 py-3 rounded-lg border border-gray-300 transition-colors duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                </svg>
                                <span>Sign In</span>
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        
        </div>
    </div>

    <x-footer-user></x-footer-user>
</body>
</html>