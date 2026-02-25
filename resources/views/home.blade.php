<x-layout>
    <x-slot:title>Home | Community Job Board</x-slot>

        <div class="mb-12 text-center">
            <h1 class="text-4xl font-bold text-gray-900">Find a Developer Job</h1>
            <p class="text-gray-600 mt-2">The simplest way to browse community postings.</p>

            <form action="{{route('home')}}" method="get">
                @csrf
                @foreach($selectedTags as $sTag)
                <input type="hidden" name="tag[]" value="{{ $sTag }}">
                @endforeach
                <div class="mt-10 max-w-xl mx-auto relative">
                    <input type="text" name="search"
                        value="{{ request('search') }}"
                        placeholder="Search job titles or companies..."
                        class="w-full p-4 rounded-lg border border-gray-300 shadow-sm">
                    <button class="absolute right-2 top-2 bg-gray-300 px-6 py-2 rounded-lg cursor-pointer
                font-bold hover:bg-blue-500 transition">
                        Search
                    </button>
                </div>
            </form>
        </div>


        <div class="space-y-4 mx-auto px-6 container p-4 mb-6">

            <div class="flex flex-wrap gap-2">
                <a href="{{ route('home') }}"
                    class="px-4 py-1.5 rounded-full text-xs font-medium border transition 
           {{ empty($selectedTags) ? 'bg-blue-600 text-white border-blue-600' : 'bg-gray-50 text-gray-600 border-gray-200 hover:bg-gray-100' }}">
                    All Jobs
                </a>

                @foreach($tags as $tag)
                @php
                $currentSelection = $selectedTags;
                if (in_array($tag->slug, $currentSelection)) {
                $currentSelection = array_diff($currentSelection, [$tag->slug]);
                } else {
                $currentSelection[] = $tag->slug;
                }
                @endphp

                <a href="{{ route('home', ['tag' => $currentSelection, 'search' => request('search')]) }}"
                    class="px-4 py-1.5 rounded-full text-xs font-medium border transition 
               {{ in_array($tag->slug, $selectedTags) ? 'bg-blue-600 text-white border-blue-600' : 'bg-gray-50 text-gray-600 border-gray-200 hover:bg-gray-100' }}">
                    {{ $tag->name }}
                </a>
                @endforeach
            </div>
        </div>

        <div class="space-y-4 mx-auto px-6 container">
            <!-- <h1 class="text-3xl font-bold mb-6">Latest Job Openings</h1> -->

            <div class="space-y-4">
                @forelse($listings as $listing)
                <div class="flex-1 flex items-center p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition">
                    <div class="flex-shrink-0 w-12 h-12 mr-6">


                        @if($listing->logo)
                        <img src="{{ asset('storage/' . $listing->logo) }}"
                            alt="{{ $listing->company_name }}"
                            class="w-full h-full rounded-lg object-cover">
                        @else
                        <div class="w-full h-full rounded-full bg-white border-2 
                        border-blue-200 flex items-center justify-center shadow-md">
                            <span class="text-blue-600 font-bold text-2xl uppercase tracking-tighter">
                                {{ substr($listing->company_name, 0, 1) }}
                            </span>
                        </div>
                        @endif

                    </div>

                    <div class="w-2/5 min-w-[100px] mr-10">
                        <h2 class="text-xl font-bold text-blue-600 leading-none truncate" title="{{ $listing->title }}">
                            <a href="{{ route('listings.show', $listing->slug) }}">{{ $listing->title }}</a>
                        </h2>
                        <p class="text-gray-600 mt-2 leading-none truncate">{{ $listing->company_name }}</p>

                    </div>
                    <div class="flex flex-wrap gap-2 mt-0 w-2/5 min-w-0">
                        @foreach($listing->tags as $tag)
                        <span class="text-xs font-medium bg-gray-50 border border-gray-200 text-gray-600 
                        px-2 rounded-full transition">
                            {{ $tag->name }}
                        </span>
                        @endforeach
                    </div>

                    <div class="ml-auto text-sm text-gray-400">
                        {{ $listing->created_at->diffForHumans() }}
                    </div>
                </div>
                @empty
                <p>No jobs found.</p>
                @endforelse

            </div>
            <div class="mt-10 mb-8">
                {{ $listings->links() }}
            </div>
        </div>
</x-layout>