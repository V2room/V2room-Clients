<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Feed') }}
        </h2>

        <x-buttons.nav :href="route('feed.create')">
            {{ __('Create') }}
        </x-buttons.nav>
    </x-slot>

    <div class="py-8">
        @foreach($data as $item)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-xl overflow-hidden py-2">
                <div class="flex space-x-4 items-center bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <a href="#" class="block">
                        <img src="https://picsum.photos/200/200" alt="Post Thumbnail" class="w-20 h-20 object-cover">
                    </a>
                    <div class="flex flex-col">
                        <a href="{{ route('feed.show', $item) }}" class="text-lg font-medium text-gray-900 font-semibold text-indigo-50">
                            {{ $item->title }}
                        </a>
                        <div class="mb-1">
                            <p class="text-sm text-gray-400 mb-1">category</p>
                        </div>
                        <div class="mb-1">
                            <span class="bg-gray-200 rounded-full text-xs px-2 py-1 mr-2 mb-2">tag</span>
                            <span class="bg-gray-200 rounded-full text-xs px-2 py-1 mr-2 mb-2">tag</span>
                            <span class="bg-gray-200 rounded-full text-xs px-2 py-1 mr-2 mb-2">tag</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @link($data->links())
    </div>
</x-app-layout>
