@props(['active' => false])
<a {{ $attributes }} aria-current="{{ $active ? 'page' : false }}"
    class="{{ $active ? 'flex items-center bg-yellow-200 rounded-xl font-bold text-sm text-black py-3 px-4' : 'flex bg-white hover:bg-yellow-50 rounded-xl font-bold text-sm text-gray-900 py-3 px-4' }}">
    {{ $slot }}
</a>
