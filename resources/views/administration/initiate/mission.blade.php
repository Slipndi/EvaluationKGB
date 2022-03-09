@extends('index')
@section('content')
    <div class="w-100 flex mt-3 ml-3">
        <h2 class='mr-3 font-bold items-center justify-items-center'>Initiate a Mission</h2> <x-buttons.add href='/missions/create' title='create mission'/>
    </div>
    <x-error.success />
    <form class='mt-3' action="/submitMission" method="POST" id="missionSub">
    @csrf 
    <div class="flex flex-col mx-2">
        <label for='mission' class="block text-sm font-medium text-gray-700">
        <select onchange="getValue()" id='missionId' name='mission' class=" mt-1 block w-full py-4 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option>Choose a mission</option>
            @foreach($missions as $key=>$missionDetail)
                <option value='{{$missionDetail}}'>{{ $missionDetail->title }}</option>
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
                            <x-buttons.add href='/people/create'  title='create target'/>
                        </div>       
                        <div id="target"></div>         
                    </fieldset>
                </div>
                <x-hr />
                <div>
                    <fieldset>
                        <div class='flex w-100 my-3'>
                            <h3 id='titleContact'>Select your informer(s)</h3> 
                            <x-buttons.add href='/people/create' title='create contact'/>
                        </div>       
                        <div id="contactParent"></div>         
                    </fieldset>
                </div>
                <x-hr />
                <div>
                    <fieldset>
                        <div class='flex w-100 my-3'>
                            <h3 id='titleAgent'>Select your agent(s)</h3> 
                            <x-buttons.add href='/people/create' title='create agent'/>
                        </div>       
                        <div id="agentParent"></div>         
                    </fieldset>
                </div>
                <x-hr />
                <div>
                    <fieldset>
                        <div class='flex w-100 my-3'>
                            <h3 id='titleHideout'>Select your hideout</h3> 
                            <x-buttons.add href='/hideouts/create' title='create hideout'/>
                        </div>       
                        <div id="hideoutParent"></div>         
                    </fieldset>
                </div>
                <x-hr />
                <div id='alertBox' hidden class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error Missing</strong>
                    <p class="block sm:inline" id='alert'></p>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 " id='closeBtn'>
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
                <button type="button" class="
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
                    id="initiate_mission"
                >Initiate</button>
            </div>
        </div>
    </form>
<script>
    validateForm = function (event) {
    event.preventDefault();
    let formulaire = document.getElementById('missionSub');
    let checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    let agent, contact, target = false;
    checkboxes.forEach((item) => {
        if (item.id.startsWith('agents')) {
            agent = true;
        } 
        if (item.id.startsWith('contacts')) {
            contact = true
        }
        if (item.id.startsWith('targets')) {
            target = true
        }
    });
    if (agent === true && contact === true && target === true) {
        formulaire.submit.call(formulaire);
    } else {
        let closeBtn = document.getElementById('closeBtn');
        closeBtn.addEventListener(
            'click',
            () => document.getElementById('alertBox'
        ).hidden = true);
        document.getElementById('alertBox').hidden = false;
        let alertContent = document.getElementById('alert');
        alertContent.innerText = '';
        alertContent.innerText +=  (agent != true ) ? ' Agent\r': '';
        alertContent.innerText += (contact != true) ? ' Contact\r':'';
        alertContent.innerText += (target != true)  ? ' Target\r':'';
    }
}

let subButton = document.getElementById('initiate_mission');
subButton.addEventListener('click', validateForm);

</script>
@endsection