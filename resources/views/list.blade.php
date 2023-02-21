<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List') }}
        </h2>
    </x-slot>

    <div class="py-8">
        @for ($i = 0; $i < 10; $i++)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-xl shadow-md overflow-hidden py-2">
                <div class="md:flex bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="md:shrink-0">
                        <img class="h-48 w-full object-cover md:h-full md:w-20" src="/resources/images/blank.webp"
                             alt="">
                    </div>
                    <div class="p-2">
                        <div class="uppercase tracking-wide text-md text-indigo-500 font-semibold">
                            Title
                        </div>
                        <p class="block mt-1 text-sm leading-tight font-medium hover:underline text-gray-900 dark:text-gray-100">
                            category
                        </p>
                        <p class="text-sm text-slate-500">
                            tags
                        </p>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</x-app-layout>
