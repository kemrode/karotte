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

// Creating seller options
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

    // Creating a seller object
    let map = new L.map('map', mapOptions);

    // Creating a Layer object
    let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

    // Adding layer to the seller
    map.addLayer(layer);

    // Adding marker on the seller
    PopulateMap(map);
}

function GetSellerLocation(){
 return new Promise((resolve, reject) => {
     xhr = new XMLHttpRequest()
     xhr.open("GET", "/?controller=Seller&action=GetAllSellersLocationAndId");
     xhr.onload = () => {
         if (xhr.status >= 200 && xhr.status < 300) {
             resolve(xhr.response);
         } else {
             reject(xhr.statusText);
         }
     };
     xhr.onerror = () => reject(xhr.statusText);
     xhr.send();
    })
};
//*******************************//
//   FONCTIONS INTERAC. MARKER   //
//*******************************//

function PopulateMap(map){
    // Add the zoom control to top right position

        L.control.zoom({
            position:'topright'
        }).addTo(map);

    markerIcon = new L.icon({
        iconUrl: "/assets/img/carrot.png",
        iconSize:[30,40]
    });

    // Searching into DB and loop for each seller
    getSellerLoccationPromise = GetSellerLocation();
    getSellerLoccationPromise.then((result) => {
        result =JSON.parse(result);
        for(let i=0; i<result.length; i++){
            loc = result[i]["SELL_LOC"].split(";")
            console.log(loc, parseInt(loc[0]), parseInt(loc[1]));
            L.marker([parseFloat(loc[0]), parseFloat(loc[1])], {icon:markerIcon}).addTo(map).on('click', displayMarkerInfo);
        }
    }).catch((error)=>{
        console.error(error);
    })


}

function displayMarkerInfo(e){
    alert(`Lattitude : ${e.latlng.lat} | Longitude : ${e.latlng.lng}`);
    // Searching into DB seller info with this coords
}