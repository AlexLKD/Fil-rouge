<?php
require 'includes/_database.php';
session_start();
?>

<body>
    <?php
    include 'includes/header.php';
    ?>
    <!-- <main>
        <section class="container">
            <h2> Formations langue </h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Omnis commodi atque, nisi, quisquam quia eveniet sunt deserunt,
                ducimus consequatur molestias quod sed dicta unde illo architecto
                consequuntur nesciunt ab voluptate?</p>
                <img src="" alt="">
        </section>
    </main> -->
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
                    echo '<h2>' . $selectedLanguage['name'] . '</h2>';
                    echo '<p>' . $selectedLanguage['description'] . '</p>';
                    echo '<img class="classes-img" src="flags/' . $selectedLanguage['country'] . '" alt="' . $selectedLanguage['name'] . '">';
                    echo '</section>';
                    echo '</main>';
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