
<select name="{{ $name }}"
        {{ $attributes->merge(['class' => 'px-3 py-3 mt-1 rounded-lg border-gray-200 md:text-sm text-xs']) }}>
    {{ $slot }}
</select>
