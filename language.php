<?php
require 'includes/_database.php';
session_start();
?>

<body>
    <?php
    include 'includes/header.php';
    ?>
    <style>
        <?php include 'CSS/language.css'; ?>
    </style>
    <main>
        <section class="container">
            <?php
            if (isset($_GET['country'])) {
                $languageId = $_GET['country'];

                $query = $dbCo->prepare("SELECT country, name, description FROM languages WHERE country = :languageId");
                $query->execute([':languageId' => $languageId]);
                $selectedLanguage = $query->fetch(PDO::FETCH_ASSOC);

                if ($selectedLanguage) {
                    echo '<main>';
                    echo '<section class="container">';
                    echo '<h2 class="language-ttl">' . $selectedLanguage['name'] . '</h2>';
                    echo '<p class="language-desc">' . $selectedLanguage['description'] . '</p>';
                    echo '<img class="language-img" src="flags/' . $selectedLanguage['country'] . '" alt="' . $selectedLanguage['name'] . '">';
                    echo '<h3> Objectifs de la formation </h3>';
                    echo '<p> Nos cours sont adaptés à tous niveaux, avancer à votre rythme et choisissez les difficultés vous correspondants afin de vous améliorer en ' . strtolower($selectedLanguage['name']) . '</p>';
                    echo '<h3> Nos formations </h3>';
                    echo '<div class="difficulty-box">';
                    echo '<img class="difficulty-img" src="difficulty/debutant.jpg" alt="beginner">';
                    echo '<h4>' . $selectedLanguage['name'] . ' : Débutant</h4>';
                    echo '<p> Ce cours est conçu pour les débutants, avec pour objectif d\'acquérir les bases essentielles en ' . strtolower($selectedLanguage['name']) . ' et de développer des compétences de communication simples pour des situations quotidiennes. </p>';
                    echo '<a class="difficulty-btn cta" href="difficulty.php">En savoir plus</a>';
                    echo '</div>';
                    echo '<div class="difficulty-box">';
                    echo '<img class="difficulty-img" src="difficulty/intermediaire.jpg" alt="intermediate">';
                    echo '<h4>' . $selectedLanguage['name'] . ' : Intermédiaire</h4>';
                    echo '<p> Ce cours s\'adresse aux apprenants de niveau intermédiaire, visant à renforcer et approfondir leurs connaissances linguistiques. L\'objectif est de maîtriser des conversations plus complexes, d\'exprimer des opinions et de mieux comprendre des textes écrits en ' . strtolower($selectedLanguage['name']) . '. </p>';
                    echo '<a class="difficulty-btn cta" href="difficulty.php">En savoir plus</a>';
                    echo '</div>';
                    echo '<div class="difficulty-box">';
                    echo '<img class="difficulty-img" src="difficulty/expert.jpg" alt="expert">';
                    echo '<h4>' . $selectedLanguage['name'] . ' : Expert</h4>';
                    echo '<p> Ce cours est destiné aux experts en la matière, visant à perfectionner leurs compétences linguistiques à un niveau avancé. L\'objectif est de maîtriser la langue de manière fluide et précise, de pouvoir communiquer de manière sophistiquée, de comprendre des textes complexes et d\'interagir avec aisance dans des contextes professionnels et culturels exigeants.</p>';
                    echo '<a class="difficulty-btn cta" href="difficulty.php">En savoir plus</a>';
                    echo '</div>';
                } else {
                    echo '<p>Language not found.</p>';
                }
            } else {
                echo '<p>Language ID not specified.</p>';
            }
            ?>
        </section>
    </main>

</body>

</html>