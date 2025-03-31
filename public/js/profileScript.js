//DIVS SELECTOR
const info = document.getElementById('information-container');
const pwd = document.getElementById('password-container');
const account = DocumentFragment.getElementById('account-container');

//LINKS SELECTOR
const infoLink = document.getElementsByClassName('info-link');
const pwdLink = document.getElementsByClassName('pwd-link');
const accountLink = document.getElementsByClassName('account-link');

//Function onload qui masque les 
window.addEventListener('load', () => {
    info.style.display = "block";
    pwd.style.display = "none";
    account.style.display = "none";
})

infoLink.addEventListener('click', () => {
    info.style.display = "block";
    pwd.style.display = "none";
    account.style.display = "none";
})