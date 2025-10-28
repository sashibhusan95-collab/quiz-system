<!DOCTYPE html>
<html lang="en">
<head>
    <title>Certificate of Completion</title>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500&display=swap');
        
        .certificate-title {
            font-family: 'Playfair Display', serif;
        }
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-8">
    
    <!-- Print Button -->
   <button onclick="window.print()" class="no-print fixed top-4 right-4 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
    Print Certificate
</button>
<br>
<div>
    <a href="/download-certificate" class="no-print fixed top-16 right-4 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
        Download
    </a>
</div>
<div>
    <a href="/" class="no-print fixed top-28 right-4 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
        Back
    </a>
</div>

    <!-- Certificate -->
    <div class="bg-white w-full max-w-4xl border-8 border-indigo-900 p-16 text-center shadow-xl">
        
        <!-- Title -->
        <h1 class="certificate-title text-5xl font-bold text-indigo-900 mb-8">
            Certificate of Completion
        </h1>
        
        <!-- Decorative Line -->
        <div class="w-24 h-1 bg-indigo-900 mx-auto mb-12"></div>
        
        <!-- Body Text -->
        <p class="text-lg text-gray-600 mb-8">
            This is to certify that
        </p>
        
        <!-- Recipient Name -->
        <h2 class="certificate-title text-4xl font-semibold text-gray-900 mb-3">
            {{$data['name']}}
        </h2>
        <div class="w-64 h-px bg-gray-400 mx-auto mb-12"></div>
        
        <!-- Achievement -->
        <p class="text-lg text-gray-600 mb-4">
            has successfully completed the
        </p>
        
        <!-- Course Name -->
        <h3 class="certificate-title text-3xl font-semibold text-indigo-800 mb-16">
            {{$data['quiz']}}
        </h3>
        
        <!-- Date -->
        <div class="pt-8 border-t border-gray-300">
            <p class="text-sm text-gray-500 uppercase tracking-wide mb-1">Date</p>
            <p class="text-lg font-medium text-gray-800">{{date('F d, Y')}}</p>
        </div>
        
    </div>
    
</body>
</html>