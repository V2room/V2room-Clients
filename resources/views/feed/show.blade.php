<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-300">{{ $data->title }}</h1>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">
                        유머/개그
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-gray-100 text-gray-800 ml-2">
                            t1
                        </span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-gray-100 text-gray-800 ml-2">
                            t2
                        </span>
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">
                        <span class="text-sm text-gray-600 dark:text-gray-400">{{ $data->user->email }}</span>
                        <span class="text-sm text-gray-600 dark:text-gray-400 ml-2">@datetime($data->created_at)</span>
                        <span class="text-sm text-gray-600 dark:text-gray-400 mx-2">&middot;</span>
                    </p>

                    <div class="flex items-center mt-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-gray-100 text-gray-800 ml-2">
                            <x-heroicon-s-eye class="w-6 h-6 text-gray-500"/>
                            10
                        </span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-gray-100 text-gray-800 ml-2">
                            <x-heroicon-s-hand-thumb-up class="w-6 h-6 text-gray-500"/>
                            10
                        </span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-gray-100 text-gray-800 ml-2">
                            <x-heroicon-s-hand-thumb-down class="w-6 h-6 text-gray-500"/>
                            10
                        </span>
                    </div>
                </div>
            </div>

            {{--<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                </div>
            </div>--}}

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="mt-1 text-sm text-gray-600 dark:text-gray-400 break-words">
                        iejfnsdlfnsdflksdnfaksdnlfnsdlfandlsfnsdlkfdsalkdfsnldskfnslkfnalakdsnflakndlnskl
                        {!! $data->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
