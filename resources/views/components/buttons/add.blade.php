@props(['href'])

@php 
    $defaultClass = 'w-10 text-green-500  rounded-md text-sm font-medium cursor-pointer flex flex-row content-center justify-items-center';
@endphp
<a {{ $attributes->class([$defaultClass])->merge(['href' => $href]) }}> 
    <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg><span class='ml-2'> {{ $slot }} </span>
</a>