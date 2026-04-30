<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                {{ __('Message Details') }}
            </h2>
            <a href="{{ route('messages.index') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-100 border border-transparent rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-200 active:bg-gray-300 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                {{ __('Back to Inbox') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-2xl border border-gray-100">
                <!-- Sender Info Header -->
                <div class="bg-gradient-to-r from-indigo-600 to-blue-700 p-8 text-white">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                        <div class="flex items-center">
                            <div class="h-16 w-16 bg-white/20 rounded-full flex items-center justify-center text-white text-2xl font-bold backdrop-blur-sm border border-white/30">
                                {{ substr($message->name, 0, 1) }}
                            </div>
                            <div class="ml-4">
                                <h3 class="text-xl font-bold">{{ $message->name }}</h3>
                                <p class="text-indigo-100 opacity-90">{{ $message->email }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs uppercase tracking-widest text-indigo-100 font-bold mb-1">Received On</p>
                            <p class="font-medium">{{ $message->created_at->format('M d, Y - h:i A') }}</p>
                        </div>
                    </div>
                </div>

                <div class="p-8">
                    <!-- Contact Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10 pb-8 border-b border-gray-100">
                        <div class="flex items-center space-x-3 text-gray-700">
                            <div class="bg-indigo-50 p-3 rounded-xl text-indigo-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-tighter">Email Address</p>
                                <p class="font-semibold">{{ $message->email }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 text-gray-700">
                            <div class="bg-indigo-50 p-3 rounded-xl text-indigo-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-tighter">Phone Number</p>
                                <p class="font-semibold">{{ $message->phone }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Message Content -->
                    <div class="bg-gray-50 rounded-2xl p-8 border border-gray-100">
                        <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Message Content</h4>
                        <div class="prose prose-indigo max-w-none text-gray-800 leading-relaxed italic">
                            "{{ $message->message }}"
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="mt-10 flex justify-between items-center">
                        <form action="{{ route('messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Permanently delete this message?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-50 text-red-700 rounded-xl font-bold text-xs uppercase tracking-widest hover:bg-red-100 transition duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Delete Message
                            </button>
                        </form>
                        
                        <a href="mailto:{{ $message->email }}" class="inline-flex items-center px-8 py-3 bg-indigo-600 text-white rounded-xl font-bold text-sm uppercase tracking-widest hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                            </svg>
                            Reply via Email
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
