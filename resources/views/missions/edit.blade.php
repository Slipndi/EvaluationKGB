@extends('index')
@section('content')
    <form 
        action="{{ route('missions.update', $mission) }}" 
        method="POST" 
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
    >
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title"> Title</label>
            <input 
                class = "shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                id = "title" 
                type = "text"
                name = "title"
                value = '{{ $mission->title }}'
            >
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="code_name"> Codename</label>
            <input 
                class = "shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                id = "code_name" 
                type = "text"
                name = "code_name"
                value = '{{ $mission->code_name }}'
            >
        </div>
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="statut"> Statut</label>
        <select 
            id='statut' 
            name='statut' 
            class=" mt-1 block w-full py-4 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        >
            @foreach($statuts as $statut)
                <option value='{{$statut->id}}' 
                    @if($statut->id == $mission->statut_id) 
                        selected 
                    @endif
                >
                    {{$statut->title}}
                </option>
            @endforeach
        </select>
        </div>
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="speciality"> 
            Speciality
        </label>
        <select 
            id='speciality' 
            name='speciality' 
            class=" mt-1 block w-full py-4 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        >
            @foreach($specialities as $speciality)
                <option value='{{$speciality->id}}' 
                    @if($speciality->id == $mission->speciality_id) 
                        selected 
                    @endif
                >
                    {{$speciality->speciality_name}}
                </option>
            @endforeach
        </select>
        </div>     
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="country"> Country</label>
        <select 
            id='country' 
            name='country' 
            class=" mt-1 block w-full py-4 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        >
            @foreach($countries as $country)
                <option value='{{$country->id}}' 
                    @if($country->id == $mission->country_id) 
                        selected 
                    @endif
                >
                    {{$country->name}}
                </option>
            @endforeach
        </select>
        </div>             
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="type"> Type of Mission</label>
            <input 
                class = "shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                id = "type" 
                type = "text"
                name = "type"
                value = '{{ $mission->type }}'
            >
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description"> Description</label>
            <textarea 
                class = "shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                id = "description" 
                name = "description"
                cols="33"
                rows="4"
            >{{ $mission->description}}</textarea>
        </div>
            <div>
            <button 
                type="button" 
                class="
                    bg-transparent 
                    hover:bg-blue-500 
                    hover:text-white
                    text-blue-700 
                    font-semibold 
                    border 
                    boder-blue-500
                    py-2
                    mx-2
                    w-full
                "
                type="submit"
            >Update</button>
            </div>
        </div>
    </form>
@endsection    