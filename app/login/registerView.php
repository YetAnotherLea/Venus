<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Meetic - Inscription</title>
    <link rel="icon" href="../../public/assets/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/newAccountStyle.css">
</head>
<body>
    <video autoplay muted loop id="background-video" alt="Vidéo d'un ciel étoilé">
        <source src="../../public/assets/video2_medium.mp4" type="video/mp4">
    </video>
    <div class="container">
        <div class="container_all">

            <!--LOGO-->
            <div class="container_header">
                <img src="../../public/assets/venus.png" alt="Logo de Venus">
            </div>

            <!--FORM-->
            <div class="container_form">
                <form class="login-form" method="POST" action="/app/login/registerModel.php">
                    
                    <!--LEFT-->
                    <div id="left-side">
                        <!--LASTNAME-->
                        <div class="input-control">
                            <label for="lastname">Nom de famille :</label><br>
                            <input name="lastname" type="text" id="lastname" value="" placeholder="Entrer votre nom" required><br>
                        </div>
    
                        <!--FIRSTNAME-->
                        <div class="input-control">
                            <label for="firstname">Prénom :</label><br>
                            <input name="firstname" type="text" id="firstname" value="" placeholder="Entrer votre prénom" required><br>
                        </div>
    
                        <!--BIRTHDATE-->
                        <div class="input-control">
                            <label for="birthdate">Date de naissance :</label><br>
                            <input name="birthdate" type="date" id="birthdate" value="" required><br>
                        </div>
                        
                        <!--GENRE-->
                        <div class="input-control">
                            <h2>Genre :</h2>
                            <div class="radio-group_container">
                                <div class="radio-group">
                                    <input class="radio" name="genre" type="radio" id="male" value="Homme">
                                    <label for="male">Homme</label>
                                </div>
                                <div class="radio-group">
                                    <input class="radio" name="genre" type="radio" id="female" value="Femme">
                                    <label for="female">Femme</label>
                                </div>
                                <div class="radio-group">
                                    <input class="radio" name="genre" type="radio" id="other" value="Autre">
                                    <label for="other">Autre</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <!--RIGHT-->
                    <div id="right-side">
                        <!--CITY-->
                        <div class="input-control">
                            <label for="city">Ville :</label><br>
                            <input name="city" type="text" id="city" list="cities" placeholder="Entrer votre lieu de résidence" required><br>
                            <datalist id="cities_datalist"></datalist>
                        </div>
                        
                        <!--EMAIL-->
                        <div class="input-control">
                            <label for="email">Email :</label><br>
                            <input name="email" type="email" id="email" value="" placeholder="Entrer votre email" required><br>
                        </div>
    
                        <!--PASSWORD-->
                        <div class="input-control">
                            <label for="password">Mot de passe :</label><br>
                            <input name="password" type="password" id="password" value="" placeholder="Entrer votre mot de passe" required><br>
                        </div>
    
                        <!--LOISIRS-->
                        <div class="input-control">
                            <label for="hobby">Loisirs :</label><br>
                            <input name="hobby" type="text" id="hobby" value="" placeholder="Entrer au-moins un loisir" required><br>
                        </div>
                        
                        <!--SUBMIT-->
                        <button name="create" type="submit" id="submit-btn">CRÉER UN COMPTE</button>
                    </div>
                </form>
            </div>

            <!--LOGIN LINK-->
            <div class="container-choice">
                <p>Vous avez déjà un compte ?</p>
                <a class="new-account" href="./loginView.php">Connectez-vous</a>
            </div>
        </div>
    </div>
    <script src="../../public/js/newAccountScript.js"></script>
</body>
</html>
