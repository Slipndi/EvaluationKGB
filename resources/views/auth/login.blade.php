@extends('index')
@section('content')
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col mt-4 w-1/3 justify-items-center mx-auto">
    <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
        Username
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="username" type="text" placeholder="Username">
    </div>
    <div class="mb-6">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
        Password
        </label>
        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="password" placeholder="******************">
    </div>
    <div class="flex items-center justify-between">
        <button class="bg-gray-800 hover:bg-sky-400 text-white font-bold py-2 px-4 rounded" type="button">
        Sign In
        </button>
    </div>
</div>
@endsection