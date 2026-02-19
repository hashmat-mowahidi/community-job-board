<x-layout>
    <div class="min-h-[80vh] flex flex-col justify-center items-center">

        <div class="w-full max-w-md bg-white p-8 border border-gray-200 rounded-xl shadow-sm">
            <h1 class="text-2xl font-bold text-center mb-2 text-gray-800">Create an Account</h1>
            <p class="text-center text-gray-500 mb-8 text-sm">Join our job board to start posting listings.</p>

            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none @error('name') border-red-500 @enderror">
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none @error('email') border-red-500 @enderror">
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required autocomplete="off"
                        class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg 
                        focus:ring-2 focus:ring-blue-500 focus:outline-none 
                        @error('password') border-red-500 @enderror">
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required 
                        class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div> -->

                <button type="submit"
                    class="w-full bg-blue-600 text-white font-semibold py-2 
                    rounded-lg hover:bg-blue-700 transition duration-200 mt-2 cursor-pointer">
                    Register
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <p class="text-sm text-gray-600">
                    Already have an account?
                    <a href="{{route('login')}}" class="text-blue-600 font-semibold hover:underline">
                        Log in here
                    </a>
                </p>
            </div>
        </div>

    </div>
</x-layout>