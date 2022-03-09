@extends('index')
@section('content')
    <x-error.handler />
    <x-error.success />
    <form 
        action="{{ route('hideouts.update', $hideout) }}" 
        method="POST" 
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
    >
        @csrf
        @method('PUT')
        <x-form.input title='Codename' name='code_name' value="{{$hideout->code_name}}"/>
        <x-form.select title='Country' name='country_id'>
        @foreach($countries as $country)
            <option value='{{$country->id}}' {{$country->id == $hideout->country_id ? 'selected' : ''}}>
                {{$country->name}}
            </option>
        @endforeach
        </x-form.select>
        <x-form.input title='Address' name='address' value="{{$hideout->address}}"/>
        <x-form.input name='type' title='Type of hideout' value="{{$hideout->type}}" />          
        <x-form.submit>Update</x-form.submit>
    </form>
@endsection    