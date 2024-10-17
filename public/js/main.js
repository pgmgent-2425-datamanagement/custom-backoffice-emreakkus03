const buttons = document.querySelectorAll('.add_button');
const forms = document.querySelectorAll('.hidden');

buttons.forEach((button, index) => {
    button.addEventListener('click', () => {
        forms[index].style.display = 'block';
    });
});