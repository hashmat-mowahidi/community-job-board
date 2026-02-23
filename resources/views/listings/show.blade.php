<x-layout>
    <div class="min-h-[80vh] flex flex-col justify-center items-center px-4 py-12">
        
        <div class="w-full max-w-2xl bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
            
            <div class="h-32 bg-gradient-to-r from-blue-500 to-blue-700"></div>

            <div class="px-8 pb-8">
                <div class="relative flex justify-between items-end -mt-12 mb-6">
                    <div class="p-2 bg-white rounded-2xl shadow-sm border border-gray-100">
                        @if($listing->logo)
                            <img src="{{ asset('storage/' . $listing->logo) }}" alt="Logo" class="w-32 h-32 rounded-xl object-cover">
                        @else
                            <div class="w-32 h-32 rounded-xl bg-gray-200 flex items-center justify-center text-gray-400">
                                <span class="text-xs">No Logo</span>
                            </div>
                        @endif
                    </div>

                    @auth
                        @if(auth()->id === $listing->use_id)
                            <a href="#" class="mb-2 px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-semibold hover:bg-gray-50 transition">
                                Edit Profile
                            </a>
                        @endif
                    @endauth
                </div>

                <div class="space-y-1">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $listing->name }}</h1>
                    <p class="text-gray-500 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L22 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        {{ $listing->email }}
                    </p>
                </div>

                <div class="mt-8 pt-8 border-t border-gray-100">
                    <h2 class="text-lg font-bold text-gray-800 mb-4">Company Information</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Website</span>
                            @if($listing->website)
                                <a href="{{ $listing->website }}" target="_blank" class="text-blue-600 font-medium hover:underline flex items-center gap-1 mt-1">
                                    {{ parse_url($listing->website, PHP_URL_HOST) }}
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                </a>
                            @else
                                <p class="text-gray-500 italic mt-1 text-sm">No website provided</p>
                            @endif
                        </div>

                        <div>
                            <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Account Created</span>
                            <p class="text-gray-700 mt-1 font-medium">{{ $listing->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-10">
                    <a href="/" class="text-sm font-semibold text-gray-500 hover:text-blue-600 transition">
                        &larr; Back to Listings
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>