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
    <title>Profile</title>
    <link rel="icon" href="../../public/assets/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/navbar.css">
    <link rel="stylesheet" href="../../public/css/profileStyle.css">
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
                        <a class="link-info" href="#">Informations</a>
                        <a class="link-pwd" href="#">Mot de passe</a>
                        <a class="link-account" href="#">Gestion du compte</a>
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

    <div class="page-container">
        <nav id="profile-nav" aria-label="profile-nav">
            <img id="profile-picture" src="" alt="Profil">
            <h1><?= $_SESSION['lastname']; ?> <?= $_SESSION['firstname']; ?></h1>
            <div id="profile-nav-container">
                <a class="link-info" href="">Informations</a>
                <a class="link-pwd" href="">Mot de passe</a>
                <a class="link-account" href="">Gestion du compte</a>
            </div>
        </nav>
        <div id="information-container">
            <div id="profile-container">
                <div id="information-container">
                    <h2>Informations personnelles</h2>
                    <div id="sections-container">
                        <div id="left-section">
                            <h3>Nom :</h3>
                            <p id="lastname"><?= $_SESSION['lastname']; ?>
                    
                            <h3>Prénom :</h3>
                            <p id="firstname"><?= $_SESSION['firstname']; ?></p>
                    
                            <h3>Email :</h3>
                            <p id="email"><?= $_SESSION['email']; ?></p>
                    
                            <h3>Age :</h3>
                            <p id="birthdate">
                                <?php
                                    $dob = new DateTime($_SESSION['birthdate']);
                                    $today = new DateTime();
                                    $diff = $today->diff($dob);
                                    echo $diff->y;
                                ?>
                            </p>
                            <!--<h3>Signe astrologique :</h3>-->
                            <!--<p id="zodiac"><?//php echo $user['zodiac']; ?></p>-->
                    
                            <h3>Genre :</h3>
                            <p id="genre"><?= $_SESSION['genre']; ?></p>
                        </div>
                        <div id="right-section">
                            <h3>Ville :</h3>
                            <p id="city"><?= $_SESSION['city']; ?></p>
                    
                            <h3>Loisirs :</h3>
                            <p id="hobby"><?= $_SESSION['hobby']; ?></p>
                
                            <h3>Bio :</h3>
                            <p id="bio">TBD</p>
                            <a href="./updateView.php">Modifier mes informations</a>
                        </div>
                    </div>
                </div>
                <div id="password-container">
                    <h3>Mot de passe :</h3>
                    <a href="./passUpdateView.php">Modifier mon mot de passe</a>
                </div>
                <div id="account-container" class="btn-div-container">
                    <form method="POST" action="./deleteAccount.php">
                        <button type="submit" name="delete-btn" id="delete-btn">Supprimer mon compte</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../../public/js/deleteAccountScript.js"></script>
    <script src="../../public/js/navbarScript.js"></script>
    <script src="../../public/js/profileScript.js"></script>
</body>
</html>
