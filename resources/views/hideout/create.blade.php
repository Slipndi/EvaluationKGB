@extends('index')
@section('content')
    <x-error.handler />
    <x-error.success />
    <form 
        action="{{ route('hideouts.store') }}" 
        method="POST" 
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
    >
        @csrf
        <x-form.input title='Codename' name='code_name' />
        <x-form.select title='Country' name='country_id'>
        @foreach($countries as $country)
            <option value='{{$country->id}}'>
                {{$country->name}}
            </option>
        @endforeach
        </x-form.select>
        <x-form.input title='Address' name='address' />
        <x-form.input name='type' title='Type of hideout' />          
        <x-form.submit>Create</x-form.submit>
    </form>
@endsection    