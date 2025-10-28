<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Quiz Page</title>
    @vite('resources/css/app.css')
</head>
<body class=" bg-gray-50">
    <x-navbar name="{{ $name }}"></x-navbar>

    <div class="flex flex-col items-center py-10">
        <div class="bg-white shadow-2xl rounded-2xl w-full max-w-lg p-8 border-t-4 border-blue-500">
            
            @if(!session('quizDetails'))
                <h2 class="text-3xl font-bold text-center text-green-800 mb-6">Add Quiz</h2>
                
                <form action="/add-quiz" method="get" class="space-y-5">
                    <div>
                        <input type="text" 
                               placeholder="Enter Quiz Name" 
                               required 
                               name="quiz"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition">
                    </div>

                    <div>
                        <select name="category_id"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 text-white font-semibold py-3 rounded-xl shadow-lg transition">
                        Add Quiz
                    </button>
                </form>

            @else
                <div class="text-center mb-6">
                    <span class="block text-xl text-green-600 font-semibold mb-1">
                        Quiz: {{ session('quizDetails')->name }}
                    </span>
                    <p class="text-blue-600 font-medium">
                        Total MCQs: {{ $totalMCQs }}
                        @if($totalMCQs > 0)
                            <a class="text-green-600 font-semibold hover:underline text-sm ml-2" 
                               href="show-quiz/{{ session('quizDetails')->id }}/{{ session('quizDetails')->name }}">
                               View MCQs
                            </a>
                        @endif
                    </p>
                </div>

                <h2 class="text-2xl font-bold text-center text-green-800 mb-6">Add MCQs</h2>

                <form action="add-mcq" method="post" class="space-y-5">
                    @csrf
                    <div>
                        <textarea placeholder="Enter your question" name="question"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400 transition"></textarea>
                        @error('question') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    @foreach(['a','b','c','d'] as $opt)
                        <div>
                            <input type="text" 
                                   placeholder="Enter option {{ strtoupper($opt) }}" 
                                   name="{{ $opt }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                            @error($opt) <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    @endforeach

                    <div>
                        <select name="correct_ans"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400 transition">
                            <option value="">Select Right Answer</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                            <option value="d">D</option>
                        </select>
                        @error('correct_ans') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-3">
                        <button type="submit" name="submit" value="add-more"
                                class="w-full bg-gradient-to-r from-blue-500 to-green-500 hover:from-blue-600 hover:to-green-600 text-white font-semibold py-3 rounded-xl shadow-md transition">
                            Add More
                        </button>

                        <button type="submit" name="submit" value="done"
                                class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-xl shadow-md transition">
                            Add & Submit
                        </button>

                        <a href="/end-quiz"
                           class="block text-center bg-red-500 hover:bg-red-600 text-white font-semibold py-3 rounded-xl shadow-md transition">
                           Finish Quiz
                        </a>
                    </div>
                </form>
            @endif

        </div>
    </div>
</body>
</html>
