@extends('index')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edition de la mission</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('missions.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Houla</strong> Il y'a eu un problème avec votre saisie<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('missions.update',$mission->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="title">Titre </label>
                    <input type="text" 
                        name="title" 
                        value="{{ $mission->title }}" 
                        class="form-control" 
                        placeholder="title"
                    >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="designation">Description</label>
                    <textarea 
                        class="form-control" 
                        style="height:150px" 
                        name="description" 
                        placeholder="description"
                    >
                    {{ $mission->description }}
                </textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </div>
    </form>
@endsection