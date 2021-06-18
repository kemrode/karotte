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
    if(latitude != "" && longitude != "" && zoomLevel != ""){
        mapOptions.center = [latitude, longitude];
        mapOptions.zoom = zoomLevel;
    }else{
        mapOptions.center = [crd.latitude,crd.longitude];
    }
    GenerateMap();
}

// On error on geolocalisation Rouen is aimed
function GetLocError(err) {
    console.warn(`ERREUR (${err.code}): ${err.message}`);
    if(latitude != "" && longitude != "" && zoomLevel != ""){
        mapOptions.center = [latitude,longitude];
        mapOptions.zoom = zoomLevel;
    }
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
    let layer = new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

    // Adding layer to the seller
    map.addLayer(layer);

    // Adding marker on the seller
    PopulateMap(map);

    // Map event
    map.on('moveend', function(e){
        MapChangedHandler(map);
    });
    map.on('zoomend', function(e){
        MapChangedHandler(map);
    });
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
    GetSellerInformationFromIdPromise = GetSellerInformationFromId(e.target.options.sellerId);
    GetSellerInformationFromIdPromise.then((result) => {
        result =JSON.parse(result);
        if(result["SELL_ID"] != 0){
            sellerId = result["SELL_ID"];
            window.location.href = `/Seller/GetSellerById/${sellerId}`;
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
    let method = "GET";
    let url = "/Seller/GetAllSellerLocationAndIdAndName";
    return SendRequestReturnAPromise(method, url);

};

function GetSellerInformationFromId(id){
    let method = "GET";
    let url = `/Seller/GetSellerInformationFromId/${id}`;
    return SendRequestReturnAPromise(method, url);

};


//*******************************//
//      MAP EVENTS HANDLER       //
//*******************************//

function MapChangedHandler(map){
    let pos = {
        'latitude' : map.getCenter()['lat'],
        'longitude': map.getCenter()['lng'],
        'zoomLevel': map.getZoom()
    };
    let method = "PUT";
    let url = `/map/RegisterMapPos/${JSON.stringify(pos)}`;
    let headers = [{'name':'Content-Type', 'value':'application/json'}];

    let result = SendRequestReturnAPromise(method, url, headers);

    result.then((response)=>{
        console.log(response)
    }).catch((error)=>{
        console.error(error)
    })
}


function toast() {
    // Get the snackbar DIV
    var x = document.getElementById("snackbar");

    // Add the "show" class to DIV
    x.className = "show";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}