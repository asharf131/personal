<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                {{ __('Add New Experience') }}
            </h2>
            <a href="{{ route('experiences.index') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-100 border border-transparent rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-200 active:bg-gray-300 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                {{ __('Back to List') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-2xl border border-gray-100">
                <div class="p-8">
                    <form method="POST" action="{{ route('experiences.store') }}" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Title -->
                            <div class="col-span-1 md:col-span-2">
                                <x-input-label for="title" :value="__('Job Title')" class="font-bold text-gray-700" />
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <x-text-input id="title" class="block w-full pl-10 border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl transition duration-200"
                                                  type="text" name="title"
                                                  placeholder="e.g. Senior Web Developer"
                                                  :value="old('title')" required />
                                </div>
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <!-- Company -->
                            <div class="col-span-1">
                                <x-input-label for="company" :value="__('Company Name')" class="font-bold text-gray-700" />
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    <x-text-input id="company" class="block w-full pl-10 border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl transition duration-200"
                                                  type="text" name="company"
                                                  placeholder="e.g. Google Inc."
                                                  :value="old('company')" required />
                                </div>
                                <x-input-error :messages="$errors->get('company')" class="mt-2" />
                            </div>

                            <!-- Location -->
                            <div class="col-span-1">
                                <x-input-label for="location" :value="__('Location')" class="font-bold text-gray-700" />
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        </svg>
                                    </div>
                                    <x-text-input id="location" class="block w-full pl-10 border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl transition duration-200"
                                                  type="text" name="location"
                                                  placeholder="e.g. Mountain View, CA"
                                                  :value="old('location')" />
                                </div>
                                <x-input-error :messages="$errors->get('location')" class="mt-2" />
                            </div>

                            <!-- Start Date -->
                            <div class="col-span-1">
                                <x-input-label for="start_date" :value="__('Start Date')" class="font-bold text-gray-700" />
                                <x-text-input id="start_date" type="date" name="start_date"
                                              class="block mt-1 w-full border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl transition duration-200"
                                              :value="old('start_date')" required />
                                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                            </div>

                            <!-- End Date -->
                            <div class="col-span-1">
                                <x-input-label for="end_date" :value="__('End Date (Leave empty if current)')" class="font-bold text-gray-700" />
                                <x-text-input id="end_date" type="date" name="end_date"
                                              class="block mt-1 w-full border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl transition duration-200"
                                              :value="old('end_date')" />
                                <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description / Responsibilities')" class="font-bold text-gray-700" />
                            <x-textarea id="description" name="description" class="block mt-1 w-full border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl transition duration-200" rows="5">
                                {{ old('description') }}
                            </x-textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end mt-8 border-t border-gray-100 pt-6">
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-blue-600 border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest hover:from-indigo-700 hover:to-blue-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-lg shadow-indigo-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                {{ __('Create Experience') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>