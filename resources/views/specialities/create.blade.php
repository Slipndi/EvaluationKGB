@extends('index')
@section('content')
<x-error.handler />
<x-error.success />
    <form 
        action="{{ route('specialities.store') }}" 
        method="POST" 
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
    >
        @csrf
        <x-form.input title='Speciality' name='speciality_name' />
        <x-form.submit>Create</x-form.submit>
    </form>
@endsection