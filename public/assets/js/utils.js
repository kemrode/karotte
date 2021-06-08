/*
 * Fonction permettant d'envoyer une requête au controller
 * S'utilise en passant en argument :
 *  - method = "PUT", "POST", "DELETE", "GET", ...
 *  - url = url complete avec les paramètres si besoin ex : `/map/RegisterMapPos/${JSON.stringify(pos)}`
 *  - headers = tableau de json de type [{'name':'Content-Type', 'value':'application/json'}]
 *
 *  Renvoie une promise
 *  ex :
 * resultatRequete = SendRequestReturnAPromise("POST", url, headers? )
 *     resultatRequete.then((response)=>{
 *      response = résultat si succes
 *  }).catch((error)=>{
 *      resultatRequete = résultat si échec
 *  })
 */

function SendRequestReturnAPromise(method, url, headers = []){
    return new Promise((resolve, reject) => {
    xhr = new XMLHttpRequest()
    xhr.open(method, url);
    if(headers.length>0){
        for(let i = 0; i<headers.length; i++){
            xhr.setRequestHeader(headers['name'], headers['value']);
        }
    }
    xhr.onload = () => {
        if (xhr.status >= 200 && xhr.status < 300) {
            resolve(xhr.response);
        } else {
            reject(xhr.statusText);
        }
    };
    xhr.onerror = () => reject(xhr.statusText);
    xhr.send();
    });
}