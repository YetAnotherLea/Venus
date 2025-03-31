<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once __DIR__ . "/../../config/session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="../../public/assets/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/navbar.css">
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
    <h1>Profil de <?= $_SESSION['firstname']?></h1>
    <div class="page-container">
        <div id="information-container">
            <form method="POST" action="./passUpdateModel.php">
                <h2>Modifier votre mot de passe</h2>
                <label for="password">Mot de passe (actuel) :</label>
                <input id="password" name="password" type="password" value="" placeholder="Entrez votre mot de passe actuel">
                <br>
                
                <label for="new_pw">Mot de passe (nouveau):</label>
                <input id="new_pw" name="new_pw" type="password" value="" placeholder="Entrez votre nouveau mot de passe">
                <br>

                <button type="submit">Valider mes modifications</button>
                <a href="./profileView.php">Annuler et retourner à la page précédente</a>
            </form>
              <!--Si afficher, récupérer l'input du formulaire avec du JS-->
        </div>
        <br>
        <br>
    </div>
    <script src="../../public/js/navbarScript.js"></script>
    <!--<script src="../../public/js/profileScript.js"></script>-->
</body>
</html>