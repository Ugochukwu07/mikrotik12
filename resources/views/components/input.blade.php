<input
    {{ $attributes->merge(['class' => 'px-3 py-3 mt-1 rounded-lg border-gray-200 md:text-sm text-xs
        focus:outline-none focus:border-indigo-300 focus:ring-indigo-600 focus:ring-opacity-50 focus:ring-2']) }}
    autocomplete="off"
    type="{{ $type ?? 'text' }}"
    name="{{ $name }}"
    id="{{ $name }}"
    placeholder="{{ $placeholder ?? '' }}"
    value="{{ old($name, $value ?? '') }}"
    {{ ($required ?? false) ? 'required' : '' }}
>

@error($name)
<p class="form-error px-1 mt-1 text-red-700" role="alert">{{ $message }}</p>
@enderror
