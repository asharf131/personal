<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Welcome Section - Softer Color -->
            <div class="bg-white border border-gray-200 rounded-3xl p-8 shadow-sm relative overflow-hidden">
                <div class="relative z-10 flex items-center justify-between">
                    <div>
                        <h3 class="text-3xl font-bold text-gray-800 mb-2">Hello, {{ Auth::user()->name }}. 👋</h3>
                        <p class="text-gray-500 max-w-xl">Welcome back to your portfolio management system. Everything looks good!</p>
                    </div>
                    <div class="hidden lg:block">
                        <div class="bg-indigo-50 p-4 rounded-2xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Grid - Back to colorful style -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Experiences Stat -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center space-x-4 hover:shadow-md transition-shadow duration-300">
                    <div class="bg-blue-100 p-3 rounded-xl text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Experiences</p>
                        <p class="text-2xl font-black text-gray-900">{{ $stats['experiences'] }}</p>
                    </div>
                </div>

                <!-- Projects Stat -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center space-x-4 hover:shadow-md transition-shadow duration-300">
                    <div class="bg-indigo-100 p-3 rounded-xl text-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Projects</p>
                        <p class="text-2xl font-black text-gray-900">{{ $stats['projects'] }}</p>
                    </div>
                </div>

                <!-- Skills Stat -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center space-x-4 hover:shadow-md transition-shadow duration-300">
                    <div class="bg-purple-100 p-3 rounded-xl text-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Skills</p>
                        <p class="text-2xl font-black text-gray-900">{{ $stats['skills'] }}</p>
                    </div>
                </div>

                <!-- Messages Stat -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center space-x-4 hover:shadow-md transition-shadow duration-300">
                    <div class="bg-green-100 p-3 rounded-xl text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Messages</p>
                        <p class="text-2xl font-black text-gray-900">{{ $stats['messages'] }}</p>
                    </div>
                </div>
            </div>

            <!-- Recent Messages Table -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-50 flex justify-between items-center">
                    <h4 class="font-bold text-lg text-gray-800">Recent Messages</h4>
                    <a href="{{ route('messages.index') }}" class="text-indigo-600 text-sm font-bold hover:underline">View All</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-400 uppercase tracking-widest">Sender</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-400 uppercase tracking-widest">Message Preview</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-400 uppercase tracking-widest">Received</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($recentMessages as $message)
                            <tr class="hover:bg-gray-50/50 cursor-pointer" onclick="window.location='{{ route('messages.show', $message->id) }}'">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-8 w-8 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 text-xs font-bold">
                                            {{ substr($message->name, 0, 1) }}
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-bold text-gray-900">{{ $message->name }}</div>
                                            <div class="text-xs text-gray-500">{{ $message->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <p class="text-sm text-gray-600 truncate max-w-xs">{{ $message->message }}</p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-gray-400">
                                    {{ $message->created_at->diffForHumans() }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="px-6 py-8 text-center text-gray-400 italic">No messages found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
