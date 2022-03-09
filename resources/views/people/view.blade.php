<div class='grid md:grid-cols-2 sm:grid-cols-1 mx-3'>
    <div>
        <h1>
            {{ $person->code_name}} 
            <span class="italic text-slate-400 text-xs">
                {{$person->country()->first()->name}}
            </span>
            @auth
                <a href="{{route('people.edit', $person)}}" class="text-sm underline" > Edit </a>
            @endAuth
        </h1>
        <h2 class="text-sm text-slate-400">
            {{ucfirst($person->role()->first()->title)}}
        </h2>
        <div class="flex items-center">
            <img class=" mr-4 h-20 w-20 rounded-full ring-2 ring-white" src="{{$person->picture}}" alt="{{$person->name}}">
        </div>
    </div>
    <div>
    <div class='flex justify-center items-center flex-col'>
        <img 
            class="w-60 h-60 object-cover rounded-full border-2 border-indigo-500" 
            src="https://flagcdn.com/{{strtolower($person->country->code)}}.svg" 
            alt="{{strtolower($person->country->name)}}" 
            title="{{strtolower($person->country->name)}}" 
        />
        </div>
    </div>
</div>