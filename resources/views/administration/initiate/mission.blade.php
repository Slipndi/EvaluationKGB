@extends('index')
@section('content')
    <div class="w-100 flex mt-3">
        <h2 class='mr-3 font-bold items-center justify-items-center'>Choix de la mission</h2> <x-buttons.add href='/missions/create' />
    </div>
    <div class="col-span-2">
        <form class='mt-3'>
            <label for='mission_id' class="block text-sm font-medium text-gray-700">
            <select onchange="getValue()" id='mission_id' name='mission_id' class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option>Veuillez choisir une mission </option>
                @foreach($missions as $mission)
                    <option value='{{$mission}}'>{{ $mission->title }}</option>
                @endforeach
            </select>
        </form>
    </div>
    <script type="text/javascript">
        const getValue = () => {
            let select = document.getElementById('mission_id');
            let mission = select.value;
            let element = document.createElement("<x-cards.admin :mission='"+ mission +"'/>");
            document.body.insertAfter(element, select);
            console.log(mission);
        }
    </script>

@endsection