@props(['href'])

@php 
    $defaultClass = 'text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium cursor-pointer';
@endphp

<a {{ $attributes->class([$defaultClass])->merge(['href' => $href]) }}> 
    {{ $slot }}
</a>