@props(['value', 'items'])

<label {{ $attributes->merge([
    'class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300',
    'for' => $attributes['id'],
])->except(['id', 'name', '@items']) }}
>
    {{ $value ?? $slot }}
</label>
<x-forms.select {{ $attributes }}/>