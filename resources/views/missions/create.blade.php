@extends('index')
@section('content')
    <x-error.handler />
    <form 
        action="{{ route('missions.store') }}" 
        method="POST" 
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
    >
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title"> Title</label>
            <input 
                class = "shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                id = "title" 
                type = "text"
                name = "title"
            >
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="code_name">Codename</label>
            <input 
                class = "shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                id = "code_name" 
                type = "text"
                name = "code_name"
            >
        </div>
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="statut_id"> Statut</label>
        <select 
            id='statut_id' 
            name='statut_id' 
            class=" mt-1 block w-full py-4 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        >
            @foreach($statuts as $statut)
                <option value='{{$statut->id}}'>
                    {{$statut->title}}
                </option>
            @endforeach
        </select>
        </div>
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="speciality_id"> 
            Speciality
        </label>
        <select 
            id='speciality_id' 
            name='speciality_id' 
            class=" mt-1 block w-full py-4 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        >
            @foreach($specialities as $speciality)
                <option value='{{$speciality->id}}'>
                    {{$speciality->speciality_name}}
                </option>
            @endforeach
        </select>
        </div>     
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="country_id"> Country</label>
        <select 
            id='country_id' 
            name='country_id' 
            class=" mt-1 block w-full py-4 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        >
            @foreach($countries as $country)
                <option value='{{$country->id}}'>
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
            ></textarea>
        </div>
        <div class="flex items-center justify-center">
            <div class="datepicker relative form-floating mb-3 xl:w-96">
                <label for="start_date" class="text-gray-700">Select Period</label>
                <input 
                id="start_date" 
                type="date"
                name="start_date"
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                placeholder="Select a start date" 
                />
                <input 
                id="end_date"
                type="date"
                name="end_date"
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                placeholder="Select an end date" 
                />
            </div>
        </div>
        <div>
            <button 
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
            >Create</button>
            </div>
        </div>
    </form>
@endsection    