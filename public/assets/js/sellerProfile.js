function ReloadPage(id){
    let method = "POST";
    let url = `/Profile/CancelCurrentModification/${id}`;
    let res =  SendRequestReturnAPromise(method, url);
    res.then(window.location = `/Profile/SellerProfileView/${id}`);
}