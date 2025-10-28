<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Categories Page</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-green-50 to-blue-50 min-h-screen">
    <x-navbar name="{{ $name }}"></x-navbar>

    <div class="flex flex-col items-center pt-10 px-4">
        <div class="bg-white w-full max-w-4xl rounded-2xl shadow-2xl p-8 border-t-4 border-green-500">
            
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-green-700">
                    Quiz Name: <span class="text-blue-600">{{ $quizName }}</span>
                </h2>
                <a href="/add-quiz"
                   class="text-white bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 font-semibold text-sm px-4 py-2 rounded-lg shadow-md transition">
                   ← Back
                </a>
            </div>

            <div class="overflow-hidden rounded-xl border border-gray-200">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gradient-to-r from-green-500 to-blue-500 text-white">
                        <tr>
                            <th class="py-3 px-4 text-sm font-semibold tracking-wide">MCQ ID</th>
                            <th class="py-3 px-4 text-sm font-semibold tracking-wide">Question</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($mcqs as $mcq)
                        <tr class="hover:bg-green-50 transition">
                            <td class="py-3 px-4 text-gray-700 font-medium">{{ $mcq->id }}</td>
                            <td class="py-3 px-4 text-gray-800">{{ $mcq->question }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if(count($mcqs) === 0)
                <div class="text-center mt-6 text-gray-500 italic">
                    No MCQs found for this quiz.
                </div>
            @endif
        </div>
    </div>
</body>
</html>


