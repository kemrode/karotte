//let blockToDisplay = document.getElementsByClassName("myAccountBtn");
//let contentDrop = document.getElementsByClassName(".dropContent");
let blockToDisplay = document.querySelectorAll(".minSize");
let contentDrop = document.querySelectorAll(".dropMinSize");
//function to display hamburgerMenu when media max-width 768px
//member icone:
blockToDisplay[1].addEventListener('click', ()=>{
    if(contentDrop[1].style.display == "block"){
        contentDrop[1].style.display = "none";
    } else {
        contentDrop[1].style.display = "block";
        contentDrop[1].style.marginTop = "200px";
    }
});
//hamburgermenu icon:
blockToDisplay[0].addEventListener('click', ()=>{
    if(contentDrop[0].style.display == "block"){
        contentDrop[0].style.display = "none";
    } else {
        contentDrop[0].style.display = "block";
        contentDrop[0].style.marginTop = "251px";
    }
});