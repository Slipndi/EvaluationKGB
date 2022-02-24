@extends('index')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New mission</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('missions.index') }}"> Back</a>
        </div>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Error!</strong> <br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('missions.store') }}" method="post">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="title"> Titre </label>
                <input type="text" name="title" class="form-control" placeholder="title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </div>
</form>
@endsection