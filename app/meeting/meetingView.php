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
    <title>Recherche</title>
    <link rel="icon" href="../../public/assets/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/navbar.css">
    <link rel="stylesheet" href="../../public/css/meetingStyle.css">
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
    <main>
        <div id="form-container">
        <form id="form" role="search" method="GET" action="./meetingController.php">

            <!--FIRSTNAME-->
            <input id="search-firstname" type="search" placeholder="Search by firstname" aria-label="Search" name="name"
            value="<?php echo isset($_GET['firstname']) ? htmlspecialchars($_GET['firstname']) : ''; ?>">

            <!--GENRE-->
            <select id="search-genre" name="genre">
            <option value="">Select Genre</option>
            <?php foreach ($genres as $genre): ?>
                <option value="<?php echo htmlspecialchars($genre['id_genre']); ?>"
                    <?php echo isset($_GET['genre']) && $_GET['genre'] === $genre['id_genre'] ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($genre['genre_name']); ?>
                </option>
            <?php endforeach; ?>
            </select>
            
            <!--CITY-->
            <input class="form-control me-2" type="search" placeholder="Search by distributor" aria-label="Distributor" name="distributor" 
            value="<?php echo isset($_GET['distributor']) ? htmlspecialchars($_GET['distributor']) : ''; ?>">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
        <div id="filter-container">
            Genre
            Localisation
            Loisir
            Tranche d'âge
        </div>
        <div id="carousel-container">
            ddfd
        </div>
    </main>
    <script src="../../public/js/navbarScript.js"></script>
</body>
</html>