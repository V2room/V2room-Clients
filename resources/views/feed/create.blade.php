@php($summernoteId = 'contents')
<x-app-layout
        :hasFilteredErrors=$hasFilteredErrors
        :getFilteredErrorMessage=$getFilteredErrorMessage
>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-xl overflow-hidden py-2">
            <div class="overflow-hidden shadow-xl sm:rounded-lg dark:bg-gray-800">
                <div class="p-6">
                    <form method="POST" action="{{ route('feed.store') }}">
                        @csrf
                        <div class="mb-4">
                            <x-forms.input-label :label="__('Title')" id="title" class="mt-1 block w-full"/>
                        </div>

                        <div class="mb-4">
                            <x-forms.tag-label id="tags" class="mt-1 block w-full" :value="old('tags')"/>
                        </div>

                        <div class="mb-4">
                            <x-forms.textarea-label :id="$summernoteId" :label="__('Content')" :value="old($summernoteId)" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-buttons.save/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(() => {
                $('#{{ $summernoteId }}').summernote({
                    placeholder: '{{ __('Content') }}',
                    tabsize: 2,
                    height: 512,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear', 'white']],
                        ['color', ['white']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ],
                });
                $('#{{ $summernoteId }}').summernote('foreColor', 'white');
            });
        </script>
    @endpush
</x-app-layout>
