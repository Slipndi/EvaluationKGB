@extends('index')
@section('content')
<form action="{{route('checkAuth')}}" method="POST">
    @csrf
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col mt-4 w-1/3 justify-items-center mx-auto">
        <div class="mb-4">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
            Email
            </label>
            <input 
                autocomplete 
                class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" 
                id="email" 
                type="email" 
                placeholder="email" 
                name="email"
            >   
            @error('email')
                <div class="bg-red-900 text-white">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Password
            </label>
            <input 
                autocomplete 
                class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" 
                id="password" 
                type="password" 
                name="password"
                placeholder="******************"
            >
            @error('password')
                <div class="bg-red-900 text-white">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-gray-800 hover:bg-sky-400 text-white font-bold py-2 px-4 rounded" type="submit">
            Sign In
            </button>
        </div>
    </div>
</form>
@endsection