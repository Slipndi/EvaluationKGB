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
    display.hidden = false;

};

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


// Gestion de création de cible au click 

document.getElementById('addTarget')
    .addEventListener('click',
        (event) => {
            event.preventDefault();
            let parent = document.getElementById('target');
            let targets = targets == null ? getUser(2) : targets; 
        }
    );

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
        .then((data) => console.log(data));
};