

@php
    $classes = ($active ?? false)
                ? 'w-full flex justify-between items-center py-3 px-6 cursor-pointer bg-gray-100 text-gray-700 focus:outline-none border-r-4 border-indigo-500'
                : 'w-full flex justify-between items-center py-3 px-6 text-gray-600 cursor-pointer hover:bg-gray-100 hover:text-gray-700 focus:outline-none hover:border-r-4 hover:border-gray-900';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span class="flex items-center">
        <span class="mx-2 font-sm"><i class="fa {{ $fa }} mr-2"></i>{{ $slot }}</span>
    </span>
</a>
