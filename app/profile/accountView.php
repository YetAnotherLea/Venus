<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav id="principal-nav" aria-label="principal-nav">
        <div id="nav-container">
            <div id="nav_left-section">
                <a href="../homepage.php"><img src="../../public/assets/venus.png" alt="Venus - Lien vers la page d'accueil"></a>
                <div class="dropdown-btn" id="dropdown-profile">
                    <button id="profile-btn">Profil utilisateur <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-content" id="dropdown-content_profile">
                        <a href="#">Informations</a>
                        <a href="#">Mot de passe</a>
                        <a href="#">Gestion du compte</a>
                    </div>
                </div>
                <a href="../meeting/meetingView.php">Rencontres</a>
                <a href="./messages/messagesView.php">Messages</a>
            </div>
            <div class="nav_right-section">
                <a href="../logout.php">Déconnexion</a>
            </div>
        </div>
    </nav>
    <script src="../../public/js/navbarScript.js"></script>
</body>
</html>