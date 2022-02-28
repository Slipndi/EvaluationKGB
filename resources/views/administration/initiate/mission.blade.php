@extends('index')
@section('content')
    <div class="w-100 flex mt-3 ml-3">
        <h2 class='mr-3 font-bold items-center justify-items-center'>Choix de la mission</h2> <x-buttons.add href='/missions/create' />
    </div>
    <div class="flex flex-col mx-2">
        <form class='mt-3'>
            <label for='mission_id' class="block text-sm font-medium text-gray-700">
            <select onchange="getValue()" id='missionId' name='mission_id' class=" mt-1 block w-full py-4 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option>Veuillez choisir une mission </option>
                @foreach($missions as $mission)
                    <option value='{{$mission}}'>{{ $mission->title }}</option>
                @endforeach
            </select>
        </form>
    </div>
    <!-- Création de l'affichage de la mission séléctionnée  -->
    <div id="missionDisplay" class='max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-20 mx-auto w-full' hidden>
        <div class='flex justify-end -mt-16' id='picture'></div>
        <div>
            <h2 class="text-gray-800 text-3xl font-semibold" id="missionName"></h2>
            <h3 class="italic text-slate-400" id="missionType"></h3>
            <p> Localisation : <span id="countryName"></span></p>
            <p> CodeName : <span id="codeName"></span></p>
            <x-hr/>
            <p id='description'></p>
            <x-hr/>
            <x-buttons.add href='#' id='addTarget'> add Target </x-button.add>
            <div id='target'></div>
        </div>
    </div>
@endsection