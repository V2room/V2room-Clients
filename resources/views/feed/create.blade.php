<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-xl overflow-hidden py-2">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg bg-white dark:bg-gray-800">
                <div class="p-6">
                    <form method="POST" action="{{ route('feed.store') }}">
                        @csrf

                        <div class="mb-4">
                            <x-input-label for="title" :value="__('Title')"/>
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"/>
                            <x-input-error :messages="$errors->updatePassword->get('title')" class="mt-2"/>
                        </div>

                        <div class="mb-4">
                            {{--<x-input-label for="category" :value="__('Category')"/>--}}
                            <x-forms.select-label :value="__('Category')" id="category" name="category_id" @items='[1,2]'/>
                            <x-input-error :messages="$errors->updatePassword->get('category')" class="mt-2"/>
                        </div>

                        <div class="mb-4">
                            <x-forms.tag-label id="tags" class="mt-1 block w-full" />
                        </div>

                        <div class="mb-4">
                            <x-forms.textarea-label id="content"/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-buttons.save/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
