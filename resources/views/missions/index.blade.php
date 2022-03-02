@extends('index')
@section('content')
    <div>
        <div>
            <div>
                <a href="{{ route('missions.create') }}"> Ajouter une mission</a>
            </div>
        </div>
    </div>
    <div class='grid xl:grid-cols-3 md:grid-cols-2 sm:grid-col-1 gap-2 content-center w-full'>
        @foreach($missions as $mission)
            <x-cards.index :mission="$mission"></x-cards>
        @endforeach
    </div>
    {!! $missions->links() !!}
@endsection