@props([
    'label' => null,
    'value' => null,
    'withLabel' => true,
])

@if($withLabel)
    <x-input-label for="{{ $attributes['id'] }}" :value="$label"/>
@endif
<x-text-input {{ $attributes->merge([
    'class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300',
    'name' => $attributes['id'],
    'type'=> 'text',
    'value'=> old($attributes['id'], $value),
]) }}/>
<x-input-error :messages="$errors->get($attributes['id'])" class="mt-2"/>