@extends('index')
@section('content')
<div class='grid md:grid-cols-2 sm:grid-cols-1'>
    <div>
        <a href="{{ route('missions.index') }}"> Back</a>
        <h1 class="text-gray-800 text-3xl font-semibold">
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
                <h4>{{$person->code_name}}</h4>
                <h5 class="text-sm text-slate-400">
                    {{ucfirst($person->role()->first()->title)}} - 
                    {{ucfirst($person->first_name)}} {{strtoupper($person->last_name)}}
                </h5>

                
            @endforeach
            <x-hr/>
            <h3 class="font-bold">Hideouts</h3>
            <ul>
            @foreach($mission->hideouts()->get() as $hideout)
                <li>{{$hideout->code_name}}</li>
            @endforeach
            </ul>
        </div>
    </div>
    <div>
        <div class='flex justify-center md:justify-end -mt-16'>
            <img 
                class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" 
                src="https://flagcdn.com/{{strtolower($mission->country->code)}}.svg" 
                alt="{{strtolower($mission->country->name)}}" 
            />
        </div>
        <img src="" alt="hideout_picture" />
        <div class="grid md:grid-cols-3 sm:grid-cols-1">
        <!--generate picture for each persons -->
        </div>
    </div>
</div>
@endsection

<!-- a faire 
- affichage des hideouts à droites avec nom et adresse au dessus de la photo
en dessous afficher les photos des personnes avec leur nom de code en dessous``
laisser les noms complets dans le listing
-->