@extends('index')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Missions 2022</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('missions.create') }}"> Ajouter une mission</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Titre</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($missions as $mission)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $mission->title }}</td>
            <td>{{ $mission->description }}</td>
            <td>
                <form action="{{ route('missions.destroy',$mission->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('missions.show',$mission->id) }}">Détails</a>
    
                    <a class="btn btn-primary" href="{{ route('missions.edit',$mission->id) }}">édition</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $missions->links() !!}
@endsection