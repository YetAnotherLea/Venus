<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Meetic - Connexion</title>
    <link rel="stylesheet" href="../../public/css/loginStyle.css">
    <link rel="icon" href="../../public/assets/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.typekit.net/ngh1cnt.css">
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
                <form class="login-form" method="POST" action="/app/login/loginModel.php">
                    <div class="input-control">
                        <label for="email">Email :</label><br>
                        <input name="email" type="email" id="email" value="" placeholder="Entrer votre email" required><br>
                    </div>

                    <div class="input-control">
                        <label for="password">Mot de passe :</label><br>
                        <input name="password" type="password" id="password" value="" placeholder="Entrer votre mot de passe" required><br>
                        <div id="pwd-forgot">
                            <a href="#">Mot de passe oublié</a>
                        </div>
                    </div>

                    <button id="login_btn" name="login" type="submit">CONNEXION</button>
                </form>
            </div>
            <div class="container-choice">
                <p>Vous n'avez pas encore de compte ?</p>
                <a class="new-account" href="../../app/login/registerView.php">Inscrivez-vous</a>
            </div>
        </div>
    </div>

    <!--SCRIPT-->
    <!--<script src="../../public/js/loginScript.js"></script>
    <div id ="hidden" style="visibility:hidden"></div>
      <script type="text/javascript">
          loadLogin();
      </script>-->
</body>
</html>
