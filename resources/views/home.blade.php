<x-layout>
    <x-slot:title>Home | Community Job Board</x-slot>

    <div class="mb-12 text-center">
        <h1 class="text-4xl font-bold text-gray-900">Find a Developer Job</h1>
        <p class="text-gray-600 mt-2">The simplest way to browse community postings.</p>
        
        <div class="mt-6 max-w-xl mx-auto">
            <input type="text" placeholder="Filter by 'Remote'..." 
                   class="w-full p-4 rounded-lg border border-gray-300 shadow-sm">
        </div>
    </div>

    <div class="container px-6 mx-auto">
        <h2>All jobs (2)</h2>
    </div>
    <div class="space-y-4 mx-auto px-6 container">
        {{-- Eventually, we will wrap this in a @foreach loop --}}
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 flex justify-between items-center">
            <div>
                <h2 class="text-xl font-bold text-blue-600">Senior Laravel Developer</h2>
                <div class="text-gray-500 text-sm">
                    <span>Acme Corp</span> • <span>Remote</span> • <span>$120k - $150k</span>
                </div>
            </div>
            <div>
                <a href="/listings/slug-here" class="bg-gray-100 px-4 py-2 rounded text-sm font-semibold hover:bg-gray-200">
                    Details
                </a>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 flex justify-between items-center">
            <div>
                <h2 class="text-xl font-bold text-blue-600">Frontend Engineer (React)</h2>
                <div class="text-gray-500 text-sm">
                    <span>StartupX</span> • <span>New York</span> • <span>$100k</span>
                </div>
            </div>
            <div>
                <a href="#" class="bg-gray-100 px-4 py-2 rounded text-sm font-semibold hover:bg-gray-200">
                    Details
                </a>
            </div>
        </div>

    </div>
</x-layout>