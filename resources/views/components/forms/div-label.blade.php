@props(['value'])

<x-input-label for="{{ $attributes['id'] }}" :value="$value"/>
<div {{ $attributes->merge([
    'class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300',
]) }}></div>
<x-input-error :messages="$errors->get($attributes['id'])" class="mt-2"/>