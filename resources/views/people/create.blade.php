@extends('index')
@section('content')
<x-error.handler />
    <form 
        action="{{ route('people.store') }}" 
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
        <option>Select the role</option>
        @foreach($roles as $role)
            <option value='{{$role->id}}'>
                {{$role->title}}
            </option>
        @endforeach
        </x-form.select> 
        <x-form.input name='birthdate' title='Birthdate' type='date' />
        <fieldset class='border-2 rounded-md mb-4 px-4 pb-4' id='speciality_fieldset' hidden>
            <div class='flex w-100 my-3'>
                <h3 class='text-gray-700 text-sm font-bold mb-2'>Specialities</h3> 
            </div>
            <div>
                @foreach($specialities as $speciality)
                <x-form.checkbox 
                    name='speciality_id' 
                    title='{{$speciality->speciality_name}}' 
                    value='{{$speciality->id}}' 
                />
                @endforeach
            </div>             
        </fieldset>
        <x-form.submit>Create</x-form.submit>
    </form>
    <script>
        // Affiche le choix des spécialités si nous créons un agent
        let roleSelect = document.getElementById('role_id');
        let specialityField = document.getElementById('speciality_fieldset');

        const displaySpecialities = (event) => { 
            let agent = '1';
            if(roleSelect.value === agent) {
                specialityField.hidden=false;
            }else {
                specialityField.hidden=true;
            }
        } 
        roleSelect.addEventListener('change', displaySpecialities)
    </script>
@endsection