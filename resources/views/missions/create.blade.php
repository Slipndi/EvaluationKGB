@extends('index')
@section('content')
    <x-error.handler />
    <form 
        action="{{ route('missions.store') }}" 
        method="POST" 
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
    >
        @csrf
        <x-form.input title='Title' name='title' />
        <x-form.input title='Codename' name='code_name' />
        <x-form.input title='Statut' name='statut_id' type="hidden" value='1' />
        <x-form.select title='Speciality' name='speciality_id'>
        @foreach($specialities as $speciality)
            <option value='{{$speciality->id}}'>
                {{$speciality->speciality_name}}
            </option>
        @endforeach
        </x-form.select>
        <x-form.select title='Country' name='country_id'>
        @foreach($countries as $country)
            <option value='{{$country->id}}'>
                {{$country->name}}
            </option>
        @endforeach
        </x-form.select>
        <x-form.input name='type' title='Type of mission' />          
        <x-form.textarea name="description" title="Description"></x-form.textarea>
        <x-form.input name='start_date' title='Start date' type='date' />
        <x-form.input name='end_date' title='End date' type='date' />
        <x-form.submit>Create</x-form.submit>
    </form>
@endsection    