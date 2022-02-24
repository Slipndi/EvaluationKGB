@props(['mission'])

<div class='max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-20'>
    <div class='flex justify-center md:justify-end -mt-16'>
        <!--trouver image de drapeau ? -->
        <img 
            class="w-20 h-20 object-cover rounded-full border-2 border-indigo-500" 
            src="https://flagcdn.com/{{strtolower($mission->country->code)}}.svg" 
            alt="{{strtolower($mission->country->name)}}" 
        />
    </div>
    <div>
        <h2 class="text-gray-800 text-3xl font-semibold">
            {# {{ $mission->statut->title }} #}
            {{ $mission->code_name}}
        </h2>
        <p>{{ $mission->description }}</p>
    </div>
    <div class='flex justify-end mt-4'>
        <form action="{{ route('missions.destroy',$mission->id) }}" method="POST">
            <a class="btn btn-info" href="{{ route('missions.show',$mission->id) }}">Détails</a>
            <a class="btn btn-primary" href="{{ route('missions.edit', $mission->id) }}">édition</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
</div>
