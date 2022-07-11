@props([
'checked' => false,
'name' => ''
])

<label class="inline-flex items-center mt-3">
    <input
        {{ $attributes->merge(['class' => 'form-checkbox h-5 w-5 rounded text-indigo-600']) }}
        name="{{ $name }}"
        id="{{ $name }}"
        type="checkbox" {{ $checked ? 'checked' : '' }}
    >
    <span class="ml-2 text-gray-900 text-md font-medium">{{ $slot }}</span>
</label>
