@extends('index')
@section('content')
    <div class="w-100 flex mt-3 ml-3">
        <h2 class='mr-3 font-bold items-center justify-items-center'>Initiate a Mission</h2> <x-buttons.add href='/missions/create' title='create mission'/>
    </div>
    <form class='mt-3'>
        <div class="flex flex-col mx-2">
        
                <label for='mission_id' class="block text-sm font-medium text-gray-700">
                <select onchange="getValue()" id='missionId' name='mission_id' class=" mt-1 block w-full py-4 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option>Choose a mission</option>
                    @foreach($missions as $mission)
                        <option value='{{$mission}}'>{{ $mission->title }}</option>
                    @endforeach
                </select>
        </div>
        <!-- Création de l'affichage de la mission séléctionnée  -->
        <div id="missionDisplay" class='max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-20 mx-auto w-full' hidden>
            <div class='flex justify-end -mt-16' id='picture'></div>
            <div>
                <h2 class="text-gray-800 text-3xl font-semibold" id="missionName"></h2>
                <h3 class="italic text-slate-400" id="missionType"></h3>
                <p> Localisation : <span id="countryName"></span></p>
                <p> CodeName : <span id="codeName"></span></p>
                <p> Speciality : <span id="speciality"></span></p>
                <x-hr/>
                <p id='description'></p>
                <x-hr/>
                <div>
                    <fieldset>
                        <div class='flex w-100 my-3'>
                            <h3 id='titleTarget'>Select your target</h3> 
                            <x-buttons.add href='/persons/create'  title='create target'/>
                        </div>       
                        <div id="target"></div>         
                    </fieldset>
                </div>
                <x-hr />
                <div>
                    <fieldset>
                        <div class='flex w-100 my-3'>
                            <h3 id='titleContact'>Select your informer(s)</h3> 
                            <x-buttons.add href='/persons/create' title='create contact'/>
                        </div>       
                        <div id="contactParent"></div>         
                    </fieldset>
                </div>
                <x-hr />
                <div>
                    <fieldset>
                        <div class='flex w-100 my-3'>
                            <h3 id='titleAgent'>Select your agent(s)</h3> 
                            <x-buttons.add href='/persons/create' title='create agent'/>
                        </div>       
                        <div id="agentParent"></div>         
                    </fieldset>
                </div>
                <x-hr />
                <div>
                    <fieldset>
                        <div class='flex w-100 my-3'>
                            <h3 id='titleHideout'>Select your hideout</h3> 
                            <x-buttons.add href='/hideout/create' title='create hideout'/>
                        </div>       
                        <div id="hideoutParent"></div>         
                    </fieldset>
                </div>
                <x-hr />
                <button type="submit" class="
                    bg-transparent 
                    hover:bg-blue-500 
                    hover:text-white
                    text-blue-700 
                    font-semibold 
                    border 
                    boder-blue-500
                    py-2
                    mx-2
                    w-full
                    "
                >Initiate</button>
            </div>
        </div>
    </form>
@endsection