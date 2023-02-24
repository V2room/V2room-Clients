@props(['items'])

<select {{ $attributes->merge([
    'class' => 'block w-full font-medium text-sm dark:text-gray-300 dark:bg-gray-900',
    'name' => $attributes['id'],
]) }}>
    @isset($items)
        @foreach($items as $item)
            <option class="block font-medium text-sm text-gray-700 dark:text-gray-300"
                    value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    @else
        <option class="block font-medium text-sm text-gray-700 dark:text-gray-300"> test</option>
        <option class="block font-medium text-sm text-gray-700 dark:text-gray-300"> test2</option>
    @endisset
</select>
<x-input-error :messages="$errors->get($attributes['id'])" class="mt-2"/>