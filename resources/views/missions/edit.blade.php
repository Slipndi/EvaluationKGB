@extends('index')
@section('content')
    <x-error.handler />
    <form 
        action="{{ route('missions.update', $mission) }}" 
        method="POST" 
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
    >
        @csrf
        @method('PUT')
        <x-form.input name="title" title="Title" value="{{$mission->title}}" />
        <x-form.input name="code_name" title="Codename" value="{{$mission->code_name}}" />
        <x-form.select name='statut_id' title='Statut'>
        @foreach($statuts as $statut)
                <option value='{{$statut->id}}' 
                    @if($statut->id == $mission->statut_id) 
                        selected 
                    @endif
                >
                    {{$statut->title}}
                </option>
            @endforeach
        </x-form.select>
        <x-form.select name="speciality_id" title="Speciality">
        @foreach($specialities as $speciality)
                <option value='{{$speciality->id}}' 
                    @if($speciality->id == $mission->speciality_id) 
                        selected 
                    @endif
                >
                    {{$speciality->speciality_name}}
                </option>
            @endforeach
        </x-form.select>
        <x-form.select name="country_id" title="Country">
            @foreach($countries as $country)
                <option value='{{$country->id}}' 
                    @if($country->id == $mission->country_id) 
                        selected 
                    @endif
                >
                    {{$country->name}}
                </option>
            @endforeach
        </x-form.select>
        <x-form.input name="type" title="Type of Mission" value="{{$mission->type}}" />
        <x-form.textarea name="description" title="Description">
            {{$mission->description}}
        </x-form.textarea>
        <x-form.input name='start_date' title='Start date' type='date' value="{{$mission->start_date}}"/>
        <x-form.input name='end_date' title='End date' type='date' value="{{$mission->end_date}}"/>
        <x-form.submit>Update</x-form.submit>
    </form>
@endsection    