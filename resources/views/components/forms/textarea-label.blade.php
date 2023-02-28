@props(['disabled' => false, 'value' => __('Content')])

<x-input-label for="{{ $attributes['id'] }}" :value="$value"/>
<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 form-textarea rounded-md shadow-sm mt-1 block w-full h-48',
    'name' => $attributes['id']
]) !!}>
    {{ old($attributes['id']) }}
</textarea>
<x-input-error :messages="$errors->get($attributes['id'])" class="mt-2"/>