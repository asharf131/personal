<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                {{ __('Edit Project') }}
            </h2>
            <a href="{{ route('projects.index') }}"
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
                    <form method="POST" action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Title -->
                            <div class="col-span-1 md:col-span-2">
                                <x-input-label for="title" :value="__('Project Title')" class="font-bold text-gray-700" />
                                <x-text-input id="title" class="block mt-1 w-full border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl transition duration-200"
                                              type="text" name="title"
                                              placeholder="e.g. Portfolio Website"
                                              :value="old('title', $project->title)" required />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <!-- Link -->
                            <div class="col-span-1 md:col-span-2">
                                <x-input-label for="link" :value="__('Project Link (URL)')" class="font-bold text-gray-700" />
                                <x-text-input id="link" class="block mt-1 w-full border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl transition duration-200"
                                              type="url" name="link"
                                              placeholder="https://example.com"
                                              :value="old('link', $project->link)" />
                                <x-input-error :messages="$errors->get('link')" class="mt-2" />
                            </div>

                            <!-- Image -->
                            <div class="col-span-1 md:col-span-2" x-data="{ imagePreview: '' }">
                                <x-input-label for="image" :value="__('Project Image (Leave empty to keep current)')" class="font-bold text-gray-700" />
                                
                                <!-- Current Image or New Preview -->
                                <div class="mt-4 mb-4 relative group w-full max-w-sm mx-auto">
                                    <div x-show="imagePreview">
                                        <img :src="imagePreview" class="w-full h-48 object-cover rounded-xl shadow-lg border-2 border-indigo-100">
                                    </div>
                                    <div x-show="!imagePreview && '{{ $project->image }}'">
                                        <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-48 object-cover rounded-xl shadow-lg border-2 border-indigo-100">
                                    </div>
                                    
                                    <button type="button" x-show="imagePreview" @click="imagePreview = ''; $refs.imageInput.value = ''" 
                                            class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 shadow-md hover:bg-red-600 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-indigo-400 transition-colors bg-gray-50">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-10 w-10 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600 justify-center">
                                            <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                                <span>Change Project Image</span>
                                                <input id="image" name="image" type="file" class="sr-only" x-ref="imageInput"
                                                       @change="const file = $event.target.files[0]; if (file) { const reader = new FileReader(); reader.onload = (e) => { imagePreview = e.target.result; }; reader.readAsDataURL(file); }">
                                            </label>
                                        </div>
                                        <p class="text-xs text-gray-500 italic">PNG, JPG up to 2MB</p>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" class="font-bold text-gray-700" />
                            <x-textarea id="description" name="description" class="block mt-1 w-full border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl transition duration-200" rows="4">
                                {{ old('description', $project->description) }}
                            </x-textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end mt-8 border-t border-gray-100 pt-6">
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-blue-600 border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest hover:from-indigo-700 hover:to-blue-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-lg shadow-indigo-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                {{ __('Update Project') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
