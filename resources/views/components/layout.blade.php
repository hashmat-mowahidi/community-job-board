<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title ?? 'Community Job Board | Find Your Next Tech Role' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 antialiased font-sans">

    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <nav class="container mx-auto px-6 h-16 flex items-center justify-between">
            <a href="/" class="text-2xl font-black tracking-tight text-blue-600">
                DEV<span class="text-gray-800">JOBS</span>
            </a>

            <div class="hidden md:flex items-center space-x-8 text-sm font-medium">
                <a href="/listings" class="hover:text-blue-600 transition">Browse Jobs</a>
                
                @auth
                    <a href="/dashboard" class="hover:text-blue-600 transition">My Postings</a>
                    <a href="/listings/create" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
                        Post a Job
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-500 hover:text-red-500 transition">Logout</button>
                    </form>
                @else
                    <a href="/login" class="text-gray-600 hover:text-blue-600 transition">Login</a>
                    <a href="/register" class="border border-blue-600 text-blue-600 px-5 py-2 rounded-lg hover:bg-blue-50 transition">
                        For Companies
                    </a>
                @endauth
            </div>
        </nav>
    </header>

    <main class="min-h-screen py-8">
        {{ $slot }}
    </main>

    <footer class="bg-white border-t border-gray-200 py-12">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div>
                    <span class="text-xl font-bold text-blue-600">DevJobs</span>
                    <p class="text-gray-500 text-sm mt-1">Connecting builders with great companies.</p>
                </div>
                <div class="flex space-x-6 text-sm text-gray-400">
                    <a href="#" class="hover:text-gray-600">Privacy Policy</a>
                    <a href="#" class="hover:text-gray-600">Terms of Service</a>
                    <p>&copy; {{ date('Y') }}</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>