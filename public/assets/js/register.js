let prodKarotte = document.querySelector(".prodKarott").value;

let colorChange = '#64b625';
let primaryColor = '#6B8954';


function changeBackgroundColorWhenClick(element, color) {
    element.style.backgroundColor = color;
}
function verifyingStatusOfButton(value) {
    if (value == "0"){
        changeBackgroundColorWhenClick(button, colorChange);
    }
    else {
        valueProdButton = "0";
        changeBackgroundColorWhenClick(button, primaryColor);
    }
}
function verifyingStatusOfUserButton(button) {
    if (valueUserButton == "0"){
        valueUserButton = "1" ;
        changeBackgroundColorWhenClick(button, colorChange);
    }
    else {
        valueUserButton = "0";
        changeBackgroundColorWhenClick(button, primaryColor);
    }
}

prodBtn.addEventListener('click', () => {
    verifyingStatusOfButton(prodKarotte);
    console.log(prodKarotte);
});
userBtn.addEventListener('click', () => {
    verifyingStatusOfUserButton(userBtn);
})