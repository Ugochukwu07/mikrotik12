@props(['value'])

<span {{ $attributes->merge(['class' => 'inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-gray-900 bg-gray-100 rounded-full']) }}>
    {{ $value ?? $slot }}
</span>
