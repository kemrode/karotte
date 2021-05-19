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

//*******************************//
//          MAP FUNC.            //
//*******************************//

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

function PopulateMap(map){
    // Add the zoom control to top right position

/*        L.control.zoom({
            position:'topright'
        }).addTo(map);*/

    let markerIcon = L.icon({
        iconSize:[30,40],
        iconUrl: "/assets/img/carrot.png"
    });


    // Searching into DB and loop for each seller
    getSellerLoccationPromise = GetSellerLocation();
    getSellerLoccationPromise.then((result) => {
        result =JSON.parse(result);
        for(let i=0; i<result.length; i++){
            loc = result[i]["SELL_LOC"].split(";");
            id = result[i]["SELL_ID"];
            sellerName = result[i]["SELL_NAME"];
            L.marker([parseFloat(loc[0]), parseFloat(loc[1])], {icon:markerIcon, sellerId:id, title:sellerName}).addTo(map).on('click', displayMarkerInfo);
        }
    }).catch((error)=>{
        console.error(error);
    })


}

//*******************************//
//   FONCTIONS INTERAC. MARKER   //
//*******************************//

function displayMarkerInfo(e){
    console.log(e.target.options.sellerId);
    GetSellerInformationFromIdPromise = GetSellerInformationFromId(e.target.options.sellerId);
    GetSellerInformationFromIdPromise.then((result) => {
        result =JSON.parse(result);
        if(result["SELL_NAME"] != 0){
            sellerName = result["SELL_NAME"];
            sellerPres = result["SELL_PRES"];
            alert(`Vendeur : ${sellerName} | Description : ${sellerPres}`);
        }
        else{
            alert('Aucun résultat trouvé pour ce vendeur');
        }
    }).catch((error)=>{
        alert(`Erreur : ${error}`);
    })

    // Searching into DB seller info with this coords
}

//*******************************//
//   FONCTIONS INTERAC. BACK     //
//*******************************//

function GetSellerLocation(){
    return new Promise((resolve, reject) => {
        xhr = new XMLHttpRequest()
        xhr.open("GET", "/?controller=Seller&action=GetAllSellerLocationAndIdAndName");
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

function GetSellerInformationFromId(id){
    return new Promise((resolve, reject) => {
        xhr = new XMLHttpRequest()
        xhr.open("GET", `/?controller=Seller&action=GetSellerInformationFromId&param=${id}`);
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