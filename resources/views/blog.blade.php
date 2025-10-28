<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz System Blog - Tips, Tricks & Updates</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <x-user-navbar></x-user-navbar>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Quiz System Blog</h1>
            <p class="text-xl text-indigo-100">Insights, tips, and updates from the world of online quizzes</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Blog Posts -->
            <div class="lg:col-span-2">
                <!-- Featured Post -->
                <article class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
                    <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=800&h=400&fit=crop" alt="Featured post" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <div class="flex items-center space-x-4 mb-4">
                            <span class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full text-sm font-medium">Featured</span>
                            <span class="text-gray-500 text-sm">5 min read</span>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-3">10 Proven Strategies to Create Engaging Quizzes</h2>
                        <p class="text-gray-600 mb-4">Discover the secrets to crafting quizzes that captivate your audience and boost engagement rates. Learn from industry experts about question design, timing, and feedback techniques.</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop" alt="Author" class="w-10 h-10 rounded-full">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">John Davis</p>
                                    <p class="text-xs text-gray-500">Oct 12, 2025</p>
                                </div>
                            </div>
                            <a href="#" class="text-indigo-600 font-medium hover:text-indigo-700">Read More →</a>
                        </div>
                    </div>
                </article>

                <!-- Blog Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Post 1 -->
                    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=400&h=250&fit=crop" alt="Blog post" class="w-full h-48 object-cover">
                        <div class="p-5">
                            <span class="bg-green-100 text-green-600 px-2 py-1 rounded text-xs font-medium">Tutorial</span>
                            <h3 class="text-xl font-bold text-gray-900 mt-3 mb-2">How to Use Quiz Analytics</h3>
                            <p class="text-gray-600 text-sm mb-4">Learn how to interpret quiz data and improve your content strategy.</p>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Oct 10, 2025</span>
                                <a href="#" class="text-indigo-600 hover:text-indigo-700">Read →</a>
                            </div>
                        </div>
                    </article>

                    <!-- Post 2 -->
                    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=400&h=250&fit=crop" alt="Blog post" class="w-full h-48 object-cover">
                        <div class="p-5">
                            <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded text-xs font-medium">Best Practices</span>
                            <h3 class="text-xl font-bold text-gray-900 mt-3 mb-2">Quiz Gamification Techniques</h3>
                            <p class="text-gray-600 text-sm mb-4">Make your quizzes more fun with these gamification strategies.</p>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Oct 8, 2025</span>
                                <a href="#" class="text-indigo-600 hover:text-indigo-700">Read →</a>
                            </div>
                        </div>
                    </article>

                    <!-- Post 3 -->
                    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                        <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=400&h=250&fit=crop" alt="Blog post" class="w-full h-48 object-cover">
                        <div class="p-5">
                            <span class="bg-purple-100 text-purple-600 px-2 py-1 rounded text-xs font-medium">Case Study</span>
                            <h3 class="text-xl font-bold text-gray-900 mt-3 mb-2">Success Story: 10x Engagement</h3>
                            <p class="text-gray-600 text-sm mb-4">How one company increased engagement using our quiz platform.</p>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Oct 5, 2025</span>
                                <a href="#" class="text-indigo-600 hover:text-indigo-700">Read →</a>
                            </div>
                        </div>
                    </article>

                    <!-- Post 4 -->
                    <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                        <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?w=400&h=250&fit=crop" alt="Blog post" class="w-full h-48 object-cover">
                        <div class="p-5">
                            <span class="bg-yellow-100 text-yellow-600 px-2 py-1 rounded text-xs font-medium">Update</span>
                            <h3 class="text-xl font-bold text-gray-900 mt-3 mb-2">New Features Released</h3>
                            <p class="text-gray-600 text-sm mb-4">Check out the latest updates to the QuizMaster platform.</p>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Oct 1, 2025</span>
                                <a href="#" class="text-indigo-600 hover:text-indigo-700">Read →</a>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Pagination -->
                <div class="flex justify-center items-center space-x-2 mt-8">
                    <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50">Previous</button>
                    <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg">1</button>
                    <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50">2</button>
                    <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50">3</button>
                    <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50">Next</button>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="space-y-6">
                <!-- Search -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Search</h3>
                    <div class="relative">
                        <input type="text" placeholder="Search articles..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <button class="absolute right-3 top-2.5 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Categories -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Categories</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600 flex justify-between"><span>Tutorials</span><span class="text-gray-400">12</span></a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600 flex justify-between"><span>Best Practices</span><span class="text-gray-400">8</span></a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600 flex justify-between"><span>Case Studies</span><span class="text-gray-400">5</span></a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600 flex justify-between"><span>Updates</span><span class="text-gray-400">15</span></a></li>
                        <li><a href="#" class="text-gray-600 hover:text-indigo-600 flex justify-between"><span>Tips & Tricks</span><span class="text-gray-400">20</span></a></li>
                    </ul>
                </div>

                <!-- Popular Posts -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Popular Posts</h3>
                    <div class="space-y-4">
                        <div class="flex space-x-3">
                            <img src="https://images.unsplash.com/photo-1501504905252-473c47e087f8?w=80&h=80&fit=crop" alt="Post" class="w-16 h-16 rounded object-cover">
                            <div>
                                <a href="#" class="text-sm font-medium text-gray-900 hover:text-indigo-600 line-clamp-2">Creating Multiple Choice Questions That Work</a>
                                <p class="text-xs text-gray-500 mt-1">Sep 28, 2025</p>
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=80&h=80&fit=crop" alt="Post" class="w-16 h-16 rounded object-cover">
                            <div>
                                <a href="#" class="text-sm font-medium text-gray-900 hover:text-indigo-600 line-clamp-2">Quiz Design Principles for Better Learning</a>
                                <p class="text-xs text-gray-500 mt-1">Sep 25, 2025</p>
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=80&h=80&fit=crop" alt="Post" class="w-16 h-16 rounded object-cover">
                            <div>
                                <a href="#" class="text-sm font-medium text-gray-900 hover:text-indigo-600 line-clamp-2">Mobile Quiz Optimization Tips</a>
                                <p class="text-xs text-gray-500 mt-1">Sep 20, 2025</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="bg-gradient-to-br from-indigo-600 to-purple-600 rounded-lg shadow-md p-6 text-white">
                    <h3 class="text-lg font-bold mb-2">Subscribe to Newsletter</h3>
                    <p class="text-sm text-indigo-100 mb-4">Get the latest quiz tips and updates delivered to your inbox.</p>
                    <input type="email" placeholder="Your email" class="w-full px-4 py-2 rounded-lg mb-3 text-gray-900">
                    <button class="w-full bg-white text-indigo-600 px-4 py-2 rounded-lg font-medium hover:bg-gray-100">Subscribe</button>
                </div>
            </aside>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold">Q</span>
                        </div>
                        <span class="text-xl font-bold text-white">QuizMaster</span>
                    </div>
                    <p class="text-sm">Create engaging quizzes that captivate your audience and drive results.</p>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Product</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white">Features</a></li>
                        <li><a href="#" class="hover:text-white">Pricing</a></li>
                        <li><a href="#" class="hover:text-white">Templates</a></li>
                        <li><a href="#" class="hover:text-white">Integrations</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Resources</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white">Blog</a></li>
                        <li><a href="#" class="hover:text-white">Documentation</a></li>
                        <li><a href="#" class="hover:text-white">Help Center</a></li>
                        <li><a href="#" class="hover:text-white">Community</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Company</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white">About</a></li>
                        <li><a href="#" class="hover:text-white">Careers</a></li>
                        <li><a href="#" class="hover:text-white">Contact</a></li>
                        <li><a href="#" class="hover:text-white">Privacy</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-sm text-center">
                <p>&copy; 2025 QuizMaster. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
