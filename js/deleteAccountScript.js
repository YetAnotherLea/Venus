const btn_dlt = document.getElementById('btn-delete');

btn_dlt.addEventListener('click', () => {
   let popup = window.confirm("Êtes-vous sûr de vouloir supprimer votre compte ?");

    if (popup == true) {
        //Exécute le php
    } else {
        //Renvoie sur la page de profil
    }
})