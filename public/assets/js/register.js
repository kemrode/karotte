
let valueButton = document.querySelector('.prodButton');
console.log(valueButton);

function changeValueAttributeButton() {
        valueButton.form.button.value = "1";
        valueButton.form.button.style.backgroundColor = '#64b625';
}

valueButton.addEventListener('click', () => {
    changeValueAttributeButton();
})