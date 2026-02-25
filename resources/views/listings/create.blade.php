<x-layout>
    <div class="min-h-[80vh] flex flex-col justify-center items-center px-4 py-12">

        <div class="w-full max-w-2xl bg-white p-8 border border-gray-200 rounded-2xl shadow-sm">

            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul class="mt-2 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Post a New Job</h1>
                <p class="text-gray-500 mt-2">Find the perfect candidate for your company</p>
            </div>

            <form action="{{ route('listings.store') }}" method="POST" class="space-y-6"
                enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">Job Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                            placeholder="e.g. Senior Laravel Developer"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg 
                            focus:ring-2 focus:ring-blue-500 outline-none transition">
                        @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700">Tags</label>
                        <input type="text" name="tags" placeholder="php, laravel, javascript" value="{{ old('tags') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                        <p class="text-xs text-gray-400 mt-1">Separate tags with commas</p>
                        @error('tags')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="company_name" class="block text-sm font-semibold text-gray-700 mb-1">Company Name</label>
                        <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}"
                            placeholder="e.g. Mircosoft"
                            class="w-full px-4 py-2 border border-gray-300 
                            rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                        @error('company_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="location" class="block text-sm font-semibold text-gray-700 mb-1">Location</label>
                        <input type="text" name="location" id="location" value="{{ old('location') }}" placeholder="e.g. Remote or NY"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                        @error('location')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="salary" class="block text-sm font-semibold text-gray-700 mb-1">Salary Range</label>
                        <input type="text" name="salary" id="salary" value="{{ old('salary') }}" placeholder="e.g. $80k - $100k"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg 
                            focus:ring-2 focus:ring-blue-500 outline-none">
                        @error('salary')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="website" class="block text-sm font-semibold text-gray-700 mb-1">Company Website</label>
                        <input type="url" name="website" id="website" value="{{ old('website') }}" placeholder="https://example.com"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition @error('website') border-red-500 @enderror">
                        @error('website')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="example@gmail.com"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition @error('website') border-red-500 @enderror">
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="logo" class="block text-sm font-semibold text-gray-700 mb-1">Company Logo</label>
                        <input type="file" name="logo" id="logo"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm text-gray-500
            file:mr-4 file:py-2 file:px-4
            file:rounded-full file:border-0
            file:text-sm file:font-semibold
            file:bg-blue-50 file:text-blue-700
            hover:file:bg-blue-100 cursor-pointer">
                        @error('logo')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Job Description</label>
                        <textarea name="description" id="description" rows="5"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg 
                            focus:ring-2 focus:ring-blue-500 outline-none">{{ old('description') }}</textarea>

                        @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg cursor-pointer hover:bg-blue-700 active:scale-[0.99] transition-all shadow-md">
                        Submit
                    </button>
                    <a href="{{route('home')}}" class="block text-center text-gray-500 mt-4 text-sm hover:text-gray-700">Cancel</a>
                </div>
            </form>
        </div>

    </div>
</x-layout>