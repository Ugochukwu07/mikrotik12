@props([
    'type' => 'success'
])

<div id="msg"
     class="{{ $type === 'success' ? 'bg-green-100 border border-green-400 text-green-700' : 'bg-red-100 border border-red-400 text-red-700' }} px-4 py-3 rounded relative mb-5" role="alert">
    {{ $slot }}
</div>
