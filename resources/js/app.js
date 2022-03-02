require('./bootstrap');

// Action déclenché quand l'utilisateur veut configurer une mission
getValue = function(){
    let display = document.getElementById('missionDisplay');
    let mission = JSON.parse(document.getElementById('missionId').value);
    let country = getCountry(mission.country_id);

    country.then((data) => {
        createImage(data.code.toLowerCase());
        insertCountryData(data);
    });

    insertMissionData(mission);
    insertTargets();
    insertInformer();
    insertAgent(mission);
    insertHideout();

    display.hidden = false;
};




// Création du lien de l'image dynamiquement en fonction du choix de la mission
createImage = function (countryCode) {
    let parent = document.getElementById('picture');
    let img = document.createElement('img');
    // Je vide l'élement parent
    parent.innerHTML='';
    // je récupère l'image du drapeau
    img.src = `https://flagcdn.com/${countryCode}.svg`;
    // Je met le style sur mon image
    img.classList.add("w-20","h-20", "object-cover", "rounded-full", "border-2", "border-indigo-500");
    // Je l'envoi dans le dom
    parent.appendChild(img);
}

// Insertion des informations lié au pays dans le tableau
insertCountryData = function (countryData) {
    let parent = document.getElementById('countryName');
    parent.innerHTML = countryData.name;
};

// Insertion des données de missions dans le dom
insertMissionData = function (missionData) {
    // je récupère les données de l'objet
    let name = missionData.title;
    let description = missionData.description;
    let code = missionData.code_name;
    let type = missionData.type;
    let speciality = missionData.speciality_name;
    // je récupère les éléments du dom
    let title = document.getElementById('missionName');
    let codeName = document.getElementById('codeName');
    let missionType = document.getElementById('missionType');
    let missionDescription = document.getElementById('description');
    let missionSpeciality = document.getElementById('speciality');

    // j'injecte les données dynamiquement
    title.innerHTML = name;
    codeName.innerHTML = code;
    missionType.innerHTML = type;
    missionDescription.innerHTML = description;
    missionSpeciality.innerHTML = speciality;
}

insertTargets = function () {
    // Je récupère les cibles disponible dans le pays
    let targets = getUser(2);
    // je récupère l'élèment qui va accueillir mes datas
    let targetParent = document.getElementById('target');
    // je vide l'ensemble du contenu
    targetParent.innerHTML = '';
    let targetTitle = document.getElementById('titleTarget');
    // Je récupère la liste des cibles disponible dans le pays
    targets.then((targetAvailable) => {
    // Si aucune cible disponible j'informe l'administrateur
    targetTitle.innerHTML = targetAvailable.length == 0 
            ? 'No target available.'
            : 'Select your target(s)';
    // Pour toutes les cibles disponibles, je crée une checkbox
        targetAvailable.forEach(
            (target) => generateCheckboxes(target, 'targets', targetParent)
        );
    });
}

insertInformer = function () {
    let contacts = getUser(3);
    let contactParent = document.getElementById('contactParent');
    contactParent.innerHTML = '';
    let contactTitle = document.getElementById('titleContact');
    // Je récupère la liste des cibles disponible dans le pays
    contacts.then((contactAvailable) => {
    // Si aucune cible disponible j'informe l'administrateur
    contactAvailable.length == 0 
            ? contactTitle.innerHTML = 'No contact available.'
            : contactTitle.innerHTML = 'Select your contact(s)';
    // Pour toutes les cibles disponibles, je crée une checkbox
    contactAvailable.forEach(
            (contact) => generateCheckboxes(contact, 'contacts', contactParent)
        );
    });
}
insertAgent = function (mission) {
    let specialityId = mission.speciality_id;
    let agents = getUser(1, specialityId);
    let agentParent = document.getElementById('agentParent');
    agentParent.innerHTML = '';
    let titleAgent = document.getElementById('titleAgent');
    // Je récupère la liste des cibles disponible dans le pays
    agents.then((agentsAvailable) => {
    // Si aucune cible disponible j'informe l'administrateur
    agentsAvailable.length == 0 
            ? titleAgent.innerHTML = 'No agent available.'
            : titleAgent.innerHTML = 'Select your agent(s)';
    // Pour toutes les cibles disponibles, je crée une checkbox
    agentsAvailable.forEach(
            (agent) => generateCheckboxes(agent, 'agents', agentParent)
        );
    });
}

insertHideout = function () {
    let hideoutsAvailable = getHideout();
    let titleHideout = document.getElementById('titleHideout');
    let hideoutParent = document.getElementById('hideoutParent');
    hideoutParent.innerHTML = '';
    hideoutsAvailable.then((hideouts) => {
        titleHideout.innerHTML =
            hideouts.length == 0
            ? 'No hideout available'
            : 'Select your hideout';
        hideouts.forEach(
            (hideout) => generateCheckboxes(hideout, 'hideouts', hideoutParent)
        );
    });

}

//Récupération des données du pays
getCountry  = function (id) {
    return fetch(`/country/json/${id}`, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        method: "get",
    })
    .then((response) => response.json())
};
    //Récupération des données du pays
getUser = function (roleId, speciality = null) {
    let mission = JSON.parse(document.getElementById('missionId').value);
    let countryId = mission.country_id;
    // permet de gérer le cas particulier des agents
    let url = speciality == null
        ? `/people/json/${roleId}/${countryId}/`
        : `/people/json/${roleId}/${countryId}/${speciality}`;
    
    return fetch(url, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        method: "get",
    })
        .then((response) => response.json())
        .then((data) => data);
};

// Permet de générer les checkBoxes en donnant, un objet Person
// un Nom d'input pour le traitement du formulaire
// et le parent qui va accueillir les elements du dom
generateCheckboxes = function (person, inputName, parent) {
    //Définition des élements du dom crée
    let div = document.createElement('div');
    let input = document.createElement('input');
    let label = document.createElement('label');
    // On les génère en fonction des données
    input.name = `${inputName}[]`;
    input.type = 'checkbox';
    input.value = person.id;
    input.id = `${inputName}_${person.id}`;
    label.setAttribute("for", person.id);
    label.classList.add('ml-2', 'inline-block');
    label.innerHTML = person.code_name;
    div.classList.add('flex', 'items-center');
    div.appendChild(input);
    div.appendChild(label);
    // on injecte l'ensemble dans le dom
    parent.append(div);
}

getHideout = function () {
    let mission = JSON.parse(document.getElementById('missionId').value);
    let countryId = mission.country_id;
    return fetch(`/hideout/json/${countryId}/`, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        method: "get",
    })
        .then((response) => response.json())
        .then((data) => data);
};

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

