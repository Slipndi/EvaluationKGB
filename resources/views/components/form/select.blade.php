@props(['name', 'title'])
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="{{$name}}"> {{$title}}</label>
    <select id='{{$name}}' name='{{$name}}' 
        class=" mt-1 block w-full py-4 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
    >
    {{$slot}}
    </select>
</div>