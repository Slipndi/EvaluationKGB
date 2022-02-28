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
    let name = missionData.title;
    let description = missionData.description;
    let code = missionData.code_name;
    let type = missionData.type;

    let title = document.getElementById('missionName');
    let codeName = document.getElementById('codeName');
    let missionType = document.getElementById('missionType');
    let missionDescription = document.getElementById('description');

    title.innerHTML = name;
    codeName.innerHTML = code;
    missionType.innerHTML = type;
    missionDescription.innerHTML = description;
}

insertTargets = function () {
    let targets = targets == null ? getUser(2) : targets;
    let targetParent = document.getElementById('target');
    targetParent.innerHTML = '';
    let targetTitle = document.getElementById('titleTarget');
    // Je récupère la liste des cibles disponible dans le pays
    targets.then((targetAvailable) => {
    // Si aucune cible disponible j'informe l'administrateur
        targetAvailable.length == 0 
            ? targetTitle.innerHTML = 'No target available.'
            : targetTitle.innerHTML = 'Select your target(s)';
    // Pour toutes les cibles disponibles, je crée une checkbox
        targetAvailable.forEach(
            (target) => generateCheckboxes(target, 'targets', targetParent)
        );
    });
}

insertInformer = function () {
    let contacts = contacts == null ? getUser(3) : contacts;
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
    input.name = inputName
    input.type = 'checkbox';
    input.value = person.id;
    input.id = person.id;
    input.required = true;
    label.setAttribute("for", person.id);
    label.classList.add('ml-2', 'inline-block');
    label.innerHTML = person.code_name;
    div.classList.add('flex', 'items-center');
    div.appendChild(input);
    div.appendChild(label);
    // on injecte l'ensemble dans le dom
    parent.append(div);
}
