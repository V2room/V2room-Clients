<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('feed.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 font-bold mb-2">{{ __('Title') }}</label>
                            <input id="title" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   name="title" value="{{ old('title') }}" required autofocus>
                        </div>

                        <div class="mb-4">
                            <label for="category"
                                   class="block text-gray-700 font-bold mb-2">{{ __('Category') }}</label>
                            <select id="category" name="category_id"
                                    class="form-select rounded-md shadow-sm mt-1 block w-full">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="tags" class="block text-gray-700 font-bold mb-2">{{ __('Tags') }}</label>
                            <div class="flex flex-wrap items-center mb-2">
                                <div class="w-full">
                                    <input type="text" id="tag-input" placeholder="{{ __('Add tags') }}"
                                           class="form-input w-full">
                                </div>
                            </div>
                            <div id="tags-container"></div>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 font-bold mb-2">{{ __('Content') }}</label>
                            <textarea id="content" class="form-textarea rounded-md shadow-sm mt-1 block w-full"
                                      name="content" required>{{ old('content') }}</textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            {{--<x-button class="ml-4">
                                {{ __('Create Post') }}
                            </x-button>--}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            const inputTag = document.querySelector('#tag-input');
            const tagsContainer = document.querySelector('#tags-container');

            inputTag.addEventListener('keyup', function (event) {
                if (event.key === 'Enter' && this.value) {
                    const tag = document.createElement('div');
                    tag.classList.add('inline-flex', 'items-center', 'bg-gray-200', 'rounded-md', 'text-sm', 'font-medium', 'text-gray-700', 'px-2', 'py-1', 'mr-2', 'mb-2');
                    tag.innerHTML = `
                    <span class="truncate">${this.value}</span>
                    <button class="flex-shrink-0 ml-1 text-gray-500 focus:outline-none focus:text-gray-700" type="button">
                        <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                            <path stroke-linecap="round" d="M1 1l6 6m0-6L1 7"></path>
                        </svg>
                    </button>
                    <input type="hidden" name="tags[]" value="${this.value}">
                `;
                    tagsContainer.appendChild(tag);
                    this.value = '';
                }
            });

            tagsContainer.addEventListener('click', function (event) {
                if (event.target.tagName === 'BUTTON' || event.target.tagName === 'svg' || event.target.tagName === 'path') {
                    event.target.closest('div').remove();
                }
            });
        </script>
    @endsection
</x-app-layout>
