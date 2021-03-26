//*******************************//
//        ANTI-LOAD              //
//*******************************//

// Empeche le script JS de s'executer tout seul au chargement de la page
document.addEventListener("load", (e) =>{
    e.preventDefault();
})

GetLoc();

//*******************************//
//        VARIABLES              //
//*******************************//

// Creating map options
let mapOptions = {
    center: [49.4431300, 1.0993200],
    zoom: 18,
    zoomControl: false
}

//*******************************//
//   GEOLOCALIZATION FUNC.       //
//*******************************//


// Geolocalisation
function GetLocSuccess(pos) {
    let crd = pos.coords;
    mapOptions.center = [crd.latitude,crd.longitude]
    GenerateMap();
}

// On error on geolocalisation Rouen is aimed
function GetLocError(err) {
    console.warn(`ERREUR (${err.code}): ${err.message}`);
    GenerateMap();
}

// Geo function
function GetLoc(){
    navigator.geolocation.getCurrentPosition(GetLocSuccess, GetLocError);
}


function GenerateMap(){

    // Creating a map object
    let map = new L.map('map', mapOptions);

    // Creating a Layer object
    let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

    // Adding layer to the map
    map.addLayer(layer);

    // Adding marker on the map
    PopulateMap(map);
}

//*******************************//
//   FONCTIONS INTERAC. MARKER   //
//*******************************//

function PopulateMap(map){

    // Searching into DB and loop for each seller

    markerIcon = new L.icon({
        iconUrl: "/public/assets/img/carrot.png",
        iconSize:[30,40]
    });

    // Add the zoom control to top right position
/*    L.control.zoom({
        position:'topright'
    }).addTo(map);*/


    L.marker([49.4431300, 1.0993200], {icon:markerIcon}).addTo(map).on('click', displayMarkerInfo);
}

function displayMarkerInfo(e){
    alert(`Lattitude : ${e.latlng.lat} | Longitude : ${e.latlng.lng}`);
    // Searching into DB seller info with this coords
}