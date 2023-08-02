<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="CSS/style.css" />
</head>
<header class="header-nav">
    <div class="header-nav-ttl">
        <a href="index.php"><img href="../index.php" class="header-logo" src="img/livre-logo.png" alt="logo" /></a>
        <h1 class="header-ttl">Polyglossia</h1>
    </div>
    <input id="header-menu-toggle" type="checkbox" />
    <label class="header-menu-button-container" for="header-menu-toggle">
        <div class="header-menu-button"></div>
    </label>
    <ul class="header-menu">
        <li><a class="header-lnk" href="index.php">Accueil</a></li>
        <li class="dropdown">
            <a class="header-lnk" href="languages.php">Formations</a>
            <!-- <div class="dropdown-content"> -->
            <?php
            // $query = $dbCo->prepare("SELECT country, name, id_language, name FROM languages");
            // $query->execute();
            // $languages = $query->fetchAll();
            // foreach ($languages as $language) {
            //     $languageLink = 'language.php?country=' . urlencode($language['country']);
            //     echo '<a href="' . $languageLink . '">' . $language['name'] . '</a>';
            // }
            ?>
            <!-- </div> -->
        </li>
        <li><a class="header-lnk" href="#">Qui sommes-nous</a></li>
        <li><a class="header-lnk" href="#">Contacts</a></li>
        <?php if (isset($_SESSION['user_id'])) : ?>
            <li><a class="header-lnk" href="dashboard.php">Mon compte</a></li>
            <li class="header-cta-desktop cta-desktop">
                <a class="header-cta cta" href="#" onclick="confirmLogout()">Se déconnecter</a>
            </li>
        <?php else : ?>
            <li class="header-cta-desktop cta-desktop">
                <a class="header-cta cta" href="login.php">Se connecter</a>
            </li>
        <?php endif; ?>
    </ul>
    <script>
        function confirmLogout() {
            if (confirm("Are you sure you want to log out?")) {
                window.location.href = "logout.php"; // Redirect to the logout page if confirmed
                return true;
            } else {
                return false;
            }
        }
    </script>


</header>