@if(session()->has('success'))
    <style>
        @keyframes slide-fade {
            0% { opacity: 0; transform: translateY(-20px); }
            10% { opacity: 1; transform: translateY(0); }
            90% { opacity: 1; transform: translateY(0); }
            100% { opacity: 0; transform: translateY(-20px); }
        }
        .toast-animate {
            animation: slide-fade 5s forwards;
        }
    </style>

    <div class="fixed top-24 left-0 right-0 flex justify-center z-[100] pointer-events-none">
        
        <div class="toast-animate pointer-events-auto bg-gray-900 text-white px-6 py-3 rounded-xl shadow-2xl border border-white/10 flex items-center gap-3">
            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="text-sm font-medium">{{ session('success') }}</span>
        </div>

    </div>
@endif

@if ($errors->any())
    <div class="max-w-xl mx-auto p-8 bg-red-50 border-l-4 border-red-500 text-red-700">
        <strong>Whoops!</strong>
        <p class="font-bold">Please fix the following errors:</p>
        <ul class="mt-2 list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
