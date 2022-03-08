@extends('index')
@section('content')
<x-error.handler />
    <form 
        action="{{ route('persons.store') }}" 
        method="POST" 
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
    >
        @csrf
        <x-form.input title='Codename' name='code_name' />
        <x-form.input title='Firstname' name='first_name' />
        <x-form.input title='Lastname' name='last_name' />
        <x-form.input type='hidden' name='picture' title='picture' 
        value='{{$picture}}'
        />
        <x-form.select title='Country' name='country_id'>
        @foreach($countries as $country)
            <option value='{{$country->id}}'>
                {{$country->name}}
            </option>
        @endforeach
        </x-form.select>
        <x-form.select title='Role' name='role_id'>
        @foreach($roles as $role)
            <option value='{{$role->id}}'>
                {{$role->title}}
            </option>
        @endforeach
        </x-form.select> 
        <x-form.input name='birthdate' title='Birthdate' type='date' />
        <x-form.submit>Create</x-form.submit>
    </form>
@endsection