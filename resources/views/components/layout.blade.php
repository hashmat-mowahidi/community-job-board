<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title ?? 'Community Job Board' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900 antialiased font-sans">
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <nav class="container mx-auto px-6 h-16 flex items-center justify-between">
            <a href="#" class="text-2xl font-black tracking-tight text-blue-600">
                JOB<span class="text-gray-800">BOARD</span>
            </a>

            <div class="hidden md:flex items-center space-x-8 text-sm font-medium">

                @auth
                <!-- <a href="/dashboard" class="hover:text-blue-600 transition">My Postings</a> -->
                <a href="{{route('listings.create')}}"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
                    Post a Job
                </a>
                <a href="{{ route('logout') }}" class="text-gray-600 hover:text-blue-600 transition">
                    Logout
                </a>

                @else
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 transition">Login</a>
                @endauth
            </div>
        </nav>
    </header>

    <main class="min-h-screen py-8">
        {{ $slot }}
    </main>

    <x-flash-msg />

    <footer class="bg-white border-t border-gray-200 py-12">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div>
                    <span class="text-xl font-bold text-blue-600">Job Board</span>
                    <p class="text-gray-500 text-sm mt-1">Connecting builders with great companies.</p>
                </div>
                <div class="flex space-x-6 text-sm text-gray-400">
                    <span>Terms of Service</span>
                    <span>&copy; {{ date('Y') }}</span>
                    <span>Privacy Policy</span>
                </div>
                    
            </div>
        </div>
    </footer>

</body>

</html>