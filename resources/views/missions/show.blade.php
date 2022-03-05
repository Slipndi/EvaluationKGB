@extends('index')
@section('content')
<div class='grid md:grid-cols-2 sm:grid-cols-1 mx-3'>
    <div>
        <h1 class="text-gray-800 text-3xl font-semibold">
        <a href="{{ route('home') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
            </svg>
        </a>
            {{ $mission->title}} 
            <span class="italic text-slate-400 text-xs">
                {{$mission->country()->first()->name}}
            </span>
        </h1>
        <h2 class="italic text-slate-400">{{ $mission->code_name }}
            <span class="text-xs">
                {{$mission->speciality()->first()->speciality_name}}
            </span>
        </h2>
        <p class='text-justify'>{{ $mission->description }}</p>
        <x-hr/>
        <div>
            @foreach($mission->persons()->orderBy('role_id')->get() as $person)
            <div class="flex items-center">
                <img class=" mr-4 h-20 w-20 rounded-full ring-2 ring-white" src="{{$person->picture}}" alt="{{$person->name}}">
                <div>
                    <h4>{{$person->code_name}}</h4>
                    <h5 class="text-sm text-slate-400">
                        {{ucfirst($person->role()->first()->title)}}
                    </h5>
                </div>
            </div>
            @endforeach
            <x-hr/>
            <h3 class="font-bold">Hideouts</h3>
            <ul>
            @foreach($mission->hideouts()->get() as $hideout)
                <li>{{$hideout->code_name}} - {{$hideout->address}} - {{$hideout->type}}</li>
            @endforeach
            </ul>
        </div>
    </div>
    <div>
        <div class='flex justify-center items-center flex-col'>
            <img 
                class="w-60 h-60 object-cover rounded-full border-2 border-indigo-500" 
                src="https://flagcdn.com/{{strtolower($mission->country->code)}}.svg" 
                alt="{{strtolower($mission->country->name)}}" 
                title="{{strtolower($mission->country->name)}}" 
            />
        </div>
    </div>
</div>
@endsection

<!-- a faire 
- affichage des hideouts à droites avec nom et adresse au dessus de la photo
en dessous afficher les photos des personnes avec leur nom de code en dessous``
laisser les noms complets dans le listing
-->