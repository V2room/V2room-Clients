@props([
    'disabled' => false,
    'label' => null,
    'value' => null,
    'withLabel' => true,
])

@if($withLabel)
    <x-input-label for="{{ $attributes['id'] }}" :value="$label"/>
@endif

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 form-textarea rounded-md shadow-sm mt-1 block w-full h-48',
    'name' => $attributes['id']
]) !!}>
    {!! $value !!}
</textarea>
<x-input-error :messages="$errors->get($attributes['id'])" class="mt-2"/>
