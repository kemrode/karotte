function ReloadPage(id){
    let method = "POST";
    let url = `/Profile/CancelCurrentModification/${id}`;
    let res =  SendRequestReturnAPromise(method, url);
    res.then(window.location = `/Profile/SellerProfileView/${id}`);
}

let deleteProductButton = document.querySelectorAll(".deleteProductButton");
deleteProductButton.forEach(x=> x.addEventListener("click", (e)=>{
    if(confirm("Attention, vous allez complètement supprimer ce produit de votre magasin")){
        let method = "PUT";
        let url = `/Product/DeleteProduct/${e.target.parentElement.parentElement.id}`;
        result =  SendRequestReturnAPromise(method, url);
        result.then((response) => {
            window.location = `/Profile/SellerProfileView/${response}`;
        });
        result.catch((error)=>{
            console.log(error);
        });
    }
    })
);

function accessToProfilePage(userId){
    window.location = `/Profile/SellerProfileView/${userId}`;
}