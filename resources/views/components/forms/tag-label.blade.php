<x-input-label for="{{ $attributes['id'] }}" :value="__('Tags')"/>
<div class="flex flex-wrap" id="tags-container">
    <x-text-input {{ $attributes  }} type="text" name="{{ $attributes['id'] }}" />
</div>

@section('scripts')
    <script>
        const inputTag = document.querySelector('#{{ $attributes['id'] }}');
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