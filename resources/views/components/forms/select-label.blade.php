@props([
    'label' => null,
    'value' => null,
    'items' => null,
    'withLabel' => true,
])

@if($withLabel)
    <x-input-label for="{{ $attributes['id'] }}" :value="$label"/>
@endif

<x-forms.select {{ $attributes }}/>