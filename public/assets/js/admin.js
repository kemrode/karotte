let table = document.querySelector('#usersTable');

table.addEventListener('click', (e)=>{
    let userName = '';
    let userId = '';

    if(e.target.classList.contains('removeIcon')){
        userName = e.target.parentElement.parentElement.children[1].innerHTML;
        userId = e.target.parentElement.parentElement.children[0].innerHTML;
    }
    if(e.target.nodeName === "path") {
        userName = e.target.parentElement.parentElement.parentElement.children[1].innerHTML;
        userId = e.target.parentElement.parentElement.parentElement.children[0].innerHTML;
    }
    if(userName != "" && userId != "")
        removeUser(userId, userName);
});

function removeUser(userId, userName){
    console.log(userId, userName);
    if(confirm(`Etes vous sur de vouloir supprimer l'utilisateur ${userName} ?`)){
        let url = '/Admin/RemoveOneUserFromLogin';
        let fd = new FormData();
        fd.append("userIdToBeDeleted", userId);

        var request = new Request(url, {
            method: 'POST',
            body: fd,
            mode: 'cors'
        })

        fetch(request).then(function(data) {
            window.location.reload();
        }).catch( (err)=> {
            alert('Le serveur est actuellement injoignable nous allons voir si le cdn est stable ou les serveur ne sont pas en feu...')
            console.log(err);});
    }
}