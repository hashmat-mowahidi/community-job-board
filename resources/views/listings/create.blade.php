<x-layout>
    <div class="min-h-[80vh] flex flex-col justify-center items-center px-4 py-12">
        
        <div class="w-full max-w-2xl bg-white p-8 border border-gray-200 rounded-2xl shadow-sm">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Post a New Job</h1>
                <p class="text-gray-500 mt-2">Find the perfect candidate for your company</p>
            </div>

            <form action="{{ route('listings.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">Job Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="e.g. Senior Laravel Developer"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition">
                        @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="company_name" class="block text-sm font-semibold text-gray-700 mb-1">Company Name</label>
                        <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                    <div>
                        <label for="location" class="block text-sm font-semibold text-gray-700 mb-1">Location</label>
                        <input type="text" name="location" id="location" value="{{ old('location') }}" placeholder="e.g. Remote or NY"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                    <div class="md:col-span-2">
                        <label for="salary" class="block text-sm font-semibold text-gray-700 mb-1">Salary Range</label>
                        <input type="text" name="salary" id="salary" value="{{ old('salary') }}" placeholder="e.g. $80k - $100k"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Job Description</label>
                        <textarea name="description" id="description" rows="5" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">{{ old('description') }}</textarea>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" 
                        class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg cursor-pointer hover:bg-blue-700 active:scale-[0.99] transition-all shadow-md">
                        Publish Listing
                    </button>
                    <a href="/" class="block text-center text-gray-500 mt-4 text-sm hover:text-gray-700">Cancel</a>
                </div>
            </form>
        </div>
        
    </div>
</x-layout>