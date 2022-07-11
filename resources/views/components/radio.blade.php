<label class="inline-flex items-center mt-3">
    <input
        {{ $attributes->merge(['class' => 'form-radio h-5 w-5 text-indigo-500']) }}
        type="radio"
        id="{{ $name }}"
        name="{{ $name }}"
    >
    <span class="ml-2 text-gray-900 text-md font-medium">{{ $slot }}</span>
</label>
