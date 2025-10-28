<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Details Page</title>
    @vite('resources/css/app.css')
</head>
<body class=" bg-gray-50">
    <x-user-navbar></x-user-navbar>
    
    <div class="flex flex-col min-h-screen items-center py-8 px-4">
        <!-- Page Header -->
        <div class="w-full max-w-6xl mb-8">
            <div class="bg-gradient-to-r from-green-600 to-blue-600 rounded-2xl shadow-xl p-8 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-4xl font-bold mb-2">Attempted Quizzes</h1>
                        <p class="text-lg opacity-90">Track your quiz progress and completion status</p>
                    </div>
                    <!-- <div class="hidden md:block">
                        <div class="bg-white bg-opacity-20 rounded-xl p-4 text-center">
                            <p class="text-sm opacity-90 mb-1">Total Quizzes</p>
                            <p class="text-3xl font-bold">{{ count($quizRecord) }}</p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="w-full max-w-6xl mb-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Total Quizzes -->
                <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-blue-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium mb-1">Total Quizzes</p>
                            <p class="text-3xl font-bold text-gray-800">{{ count($quizRecord) }}</p>
                        </div>
                        <div class="bg-blue-100 rounded-full p-3">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Completed Quizzes -->
                <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-green-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium mb-1">Completed</p>
                            <p class="text-3xl font-bold text-gray-800">
                                {{ $quizRecord->where('status', 2)->count() }}
                            </p>
                        </div>
                        <div class="bg-green-100 rounded-full p-3">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Pending Quizzes -->
                <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-orange-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium mb-1">Pending</p>
                            <p class="text-3xl font-bold text-gray-800">
                                {{ $quizRecord->where('status', '!=', 2)->count() }}
                            </p>
                        </div>
                        <div class="bg-orange-100 rounded-full p-3">
                            <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quiz Table -->
        <div class="w-full max-w-6xl">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                <!-- Table Header -->
                <div class="bg-gradient-to-r from-green-600 to-blue-600 px-6 py-4">
                    <h2 class="text-xl font-semibold text-white">Quiz List</h2>
                </div>

                <!-- Table Content -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gradient-to-r from-green-50 to-blue-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 w-20">S. No</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Quiz Name</th>
                                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700 w-40">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($quizRecord as $key=>$record)
                            <tr class="hover:bg-gradient-to-r hover:from-green-50 hover:to-blue-50 transition-all duration-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-green-100 to-blue-100 rounded-lg">
                                        <span class="text-gray-700 font-semibold">{{$key+1}}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-green-500 to-blue-500 rounded-lg flex items-center justify-center text-white font-bold">
                                            Q
                                        </div>
                                        <span class="text-gray-800 font-medium">{{$record->name}}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if($record->status==2)
                                        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold bg-green-100 text-green-700 shadow-sm">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Completed
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold bg-orange-100 text-orange-700 shadow-sm">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Pending
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Empty State (if no records) -->
                @if(count($quizRecord) == 0)
                <div class="flex flex-col items-center justify-center py-16 px-4">
                    <div class="bg-gradient-to-br from-green-100 to-blue-100 rounded-full p-6 mb-4">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">No Quizzes Attempted Yet</h3>
                    <p class="text-gray-500 text-center">Start attempting quizzes to see them here.</p>
                </div>
                @endif
            </div>
            <div class="mt-6 px-4 py-3  bg-white border-t border-gray-200  rounded-2xl  shadow-2xl sm:px-6">
            {{$quizRecord->links()}}
        </div>
        </div>
        
    </div>

    <x-footer-user></x-footer-user>
</body>
</html>