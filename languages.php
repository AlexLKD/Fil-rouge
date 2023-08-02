<?php
require 'includes/_database.php';
// require 'includes/_functions.php';

session_start();
$_SESSION['token'] = md5(uniqid(mt_rand(), true));
?>

<body>
    <?php
    require 'includes/header.php';
    ?>
    <main>
        <section class="container">
            <h2> Nos formations </h2>
            <div class="languages-boxes">
                <?php
                $query = $dbCo->prepare("SELECT country, name, description FROM languages");
                $query->execute();
                $languages = $query->fetchAll();
                foreach ($languages as $language) {
                    echo '<div class="languages-box">';
                    $languageLink = 'language.php?country=' . urlencode($language['country']);
                    echo '<a href="' . $languageLink . '">';
                    echo '<img class="classes-img" src="flags/' . $language['country'] . '.png" alt="' . $language['country'] . '" />';
                    echo '<h3>' . $language['name'] . '</h3>';
                    echo '<p class="classes-box-txt">' . $language['description'] . '</p>';
                    echo '</a>';
                    echo '</div>';
                }
                ?>
            </div>
        </section>
    </main>
    <script src="script.js"></script>
</body>

</html>