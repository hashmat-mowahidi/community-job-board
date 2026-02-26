<x-layout>


    <div class="max-w-4xl mx-auto px-6 py-12">
        <a href="{{ route('home') }}" class="text-sm font-semibold text-gray-500 hover:text-blue-600 mb-4 inline-block">
            &larr; Back to all jobs
        </a>

        <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">
            <div class="px-8 py-4 border-b border-gray-200 bg-gray-50/50">
                <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                    <div class="flex-shrink-0">
                        @if($listing->logo)
                        <img src="{{ asset('storage/' . $listing->logo) }}"
                            class="w-20 h-20 rounded-full border-3 border-gray-200 shadow-md object-cover">
                        @else
                        <div class="w-20 h-20 rounded-full bg-white border-2 border-gray-200 flex items-center justify-center shadow-sm">
                            <span class="text-blue-600 font-bold text-3xl uppercase">
                                {{ substr($listing->company_name, 0, 1) }}
                            </span>
                        </div>
                        @endif
                    </div>

                    <div class="flex-1">
                        <h1 class="text-3xl font-bold text-gray-900">{{ $listing->title }}</h1>
                        <p class="text-xl text-gray-600 mt-1">{{ $listing->company_name }}</p>

                        <div class="flex flex-wrap justify-between gap-4 mt-4 text-sm text-gray-500">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $listing->location }}
                            </span>


                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Posted {{ $listing->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-8 flex-1 flex flex-col md:flex-row item-start md:item-center gap-6">
                <div class="basis-1/3">
                    <span class="block text-xs font-bold text-gray-400 tracking-wider">Salary</span>
                    <span class="flex items-center gap-1 mt-1">
                        {{ $listing->salary }}
                    </span>
                </div>

                <div class="basis-1/3">
                    <span class="block text-xs font-bold text-gray-400 tracking-wider">Website</span>
                    <a href="{{ $listing->website }}" target="_blank"
                        class="text-blue-600 font-medium hover:underline flex items-center gap-1 mt-1">
                        {{ parse_url($listing->website, PHP_URL_HOST) }}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                    </a>
                </div>

                <div class="basis-1/3 min-w-0">
                    <h3 class="block text-xs font-bold text-gray-400 tracking-wider">Required Skills</h3>
                    <div class="flex flex-wrap gap-2 mt-1">
                        @foreach($listing->tags as $tag)
                        <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-medium border border-gray-200">
                            {{ $tag->name }}
                        </span>
                        @endforeach
                    </div>
                </div>

            </div>

            <div class="p-8">
                <h2 class="block text-s font-bold text-gray-400 tracking-wider mb-4">Job Description</h2>
                <div class="prose max-w-none text-gray-700 leading-relaxed">
                    {!! nl2br(e($listing->description)) !!}
                </div>
            </div>

            <div class="p-8 flex flex-col md:flex-row item-start md:item-center gap-6">
                <div class="flex-1">
                    <div class="flex flex-wrap justify-between gap-4 mt-4 text-sm text-gray-500">

                        @can('update', $listing)
                        <span class="flex items-center gap-4">

                            <a href="{{ route('listings.edit', $listing) }}"
                                class="px-6 py-3 text-center border border-gray-300 font-semibold rounded-lg hover:bg-gray-200 transition">
                                Edit
                            </a>
                            <form action="{{ route('listings.destroy', $listing->slug) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this job?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-4 py-3 text-center text-red-700 border border-gray-300 font-semibold 
                                rounded-lg hover:bg-gray-200 cursor-pointer transition">
                                    Delete
                                </button>
                            </form>
                        </span>
                        @endcan

                        <span class="flex items-center gap-1">

                            <a href="mailto:{{ $listing->email }}"
                                class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition text-center">
                                Apply Now
                            </a>
                        </span>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-layout>