<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('General Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-2xl border border-gray-100">
                <form method="POST" action="{{ route('settings.update') }}" class="p-8">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                        <!-- Left Column: Site Info -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-bold text-indigo-600 border-b border-indigo-50 pb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                Basic Information
                            </h3>
                            
                            <div>
                                <x-input-label for="site_name" :value="__('Website Name')" />
                                <x-text-input id="site_name" name="site_name" type="text" class="mt-1 block w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500" :value="$settings['site_name'] ?? ''" />
                            </div>

                            <div>
                                <x-input-label for="site_email" :value="__('Contact Email')" />
                                <x-text-input id="site_email" name="site_email" type="email" class="mt-1 block w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500" :value="$settings['site_email'] ?? ''" />
                            </div>

                            <div>
                                <x-input-label for="site_phone" :value="__('Phone Number')" />
                                <x-text-input id="site_phone" name="site_phone" type="text" class="mt-1 block w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500" :value="$settings['site_phone'] ?? ''" />
                            </div>
                            
                            <div>
                                <x-input-label for="site_address" :value="__('Office Address')" />
                                <x-textarea id="site_address" name="site_address" class="mt-1 block w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500" rows="2">{{ $settings['site_address'] ?? '' }}</x-textarea>
                            </div>
                        </div>

                        <!-- Middle Column: Social Links -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-bold text-indigo-600 border-b border-indigo-50 pb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.826L10.242 9.172" />
                                </svg>
                                Social Media Links
                            </h3>

                            <div>
                                <x-input-label for="facebook_link" :value="__('Facebook URL')" />
                                <x-text-input id="facebook_link" name="facebook_link" type="url" class="mt-1 block w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500" :value="$settings['facebook_link'] ?? ''" placeholder="https://facebook.com/..." />
                            </div>

                            <div>
                                <x-input-label for="twitter_link" :value="__('Twitter (X) URL')" />
                                <x-text-input id="twitter_link" name="twitter_link" type="url" class="mt-1 block w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500" :value="$settings['twitter_link'] ?? ''" placeholder="https://twitter.com/..." />
                            </div>

                            <div>
                                <x-input-label for="linkedin_link" :value="__('LinkedIn URL')" />
                                <x-text-input id="linkedin_link" name="linkedin_link" type="url" class="mt-1 block w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500" :value="$settings['linkedin_link'] ?? ''" placeholder="https://linkedin.com/in/..." />
                            </div>

                            <div>
                                <x-input-label for="github_link" :value="__('GitHub URL')" />
                                <x-text-input id="github_link" name="github_link" type="url" class="mt-1 block w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500" :value="$settings['github_link'] ?? ''" placeholder="https://github.com/..." />
                            </div>
                        </div>

                        <!-- Right Column: About Summary -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-bold text-indigo-600 border-b border-indigo-50 pb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Profile Summary
                            </h3>

                            <div>
                                <x-input-label for="about_summary" :value="__('Brief About Me')" />
                                <x-textarea id="about_summary" name="about_summary" class="mt-1 block w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500" rows="8" placeholder="Enter a short bio for your portfolio homepage...">{{ $settings['about_summary'] ?? '' }}</x-textarea>
                            </div>

                            <div class="bg-indigo-50 p-4 rounded-2xl border border-indigo-100">
                                <p class="text-xs text-indigo-700 leading-relaxed italic">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Tip: This information will be displayed on your public portfolio website.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-12 pt-8 border-t border-gray-100 flex justify-end">
                        <button type="submit" class="inline-flex items-center px-10 py-4 bg-gradient-to-r from-indigo-600 to-blue-600 border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest hover:from-indigo-700 hover:to-blue-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 transition duration-150 shadow-xl shadow-indigo-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                            </svg>
                            Save Settings
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
