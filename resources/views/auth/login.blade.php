<x-layout>
    <div class="min-h-[80vh] flex flex-col justify-center items-center">
        
        <div class="w-full max-w-md bg-white p-8 border border-gray-200 rounded-xl shadow-sm">
            <h1 class="text-2xl font-bold text-center mb-6 text-gray-800">Login</h1>

            <form action="{{ route('login')}}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required autocomplete="off"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <button type="submit" 
                    class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg 
                    hover:bg-blue-700 transition duration-200 cursor-pointer">
                    Log In
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <p class="text-sm text-gray-600">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">
                        Register here
                    </a>
                </p>
            </div>
        </div>
        
    </div>
</x-layout>