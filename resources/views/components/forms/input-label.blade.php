@props(['value'])

<x-input-label for="{{ $attributes['id'] }}" :value="$value"/>
<x-text-input {{ $attributes->merge([
    'class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300',
    'name' => $attributes['id'],
    'type'=>'text'
]) }}/>
<x-input-error :messages="$errors->get($attributes['id'])" class="mt-2"/>