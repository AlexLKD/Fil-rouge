<?php
require 'includes/_database.php';
// require 'includes/_functions.php';

session_start();
$_SESSION['token'] = md5(uniqid(mt_rand(), true));

var_dump($_SESSION);
?>

<body>
    <?php
    require 'includes/header.php';
    ?>
    <main>
        <div class="book-div">
            <img class="book-img" src="img/book.jpg" alt="book" />
            <p class="book-txt">Formez</p>
            <p class="book-txt-sub">vous</p>
            <p class="date-txt" id="date-txt"></p>
            <p class="date-txt-sub" id="date-txt-sub"></p>
        </div>
        <section class="container">
            <article class="intro">
                <h2 class="intro-ttl">
                    Polyglossia : une asso spécialisée
                </h2>
                <p class="intro-txt">
                    Lorem ipsum dolor, sit amet consectetur adipisicing
                    elit. Officia nam illum odio reiciendis necessitatibus!
                    Nam quam ipsa et neque, accusantium earum, consequuntur
                    porro explicabo nobis unde doloremque. Quidem, quia
                    explicabo?
                </p>
                <p>
                    <a class="cta intro-cta" href="#">+ sur Polyglossia</a>
                </p>
            </article>
            <article class="classes">
                <h2 class="classes-ttl">Retrouvez nos formations</h2>
                <p class="classes-txt">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Doloribus officia provident quis veritatis possimus
                    quaerat harum nemo consectetur maiores itaque quas,
                    dicta voluptates rem ducimus, beatae in doloremque!
                </p>
                <div class="classes-lang">
                    <button class="slide-arrow" id="slide-arrow-prev">
                        &#8249;
                    </button>
                    <button class="slide-arrow" id="slide-arrow-next">
                        &#8250;
                    </button>
                    <div class="classes-all-boxes" id="slides-container">
                        <?php
                        // Prepare and execute a SQL query to fetch language information from the database
                        $query = $dbCo->prepare("SELECT country, name, description FROM languages");
                        $query->execute();
                        // Fetch all languages from the query result
                        $languages = $query->fetchAll();
                        // Iterate through each language and display relevant information
                        foreach ($languages as $language) {
                            echo '<div class="classes-box">';
                            // Generate a link for each language using 'country' as parameter
                            $languageLink = 'language.php?country=' . urlencode($language['country']);
                            echo '<a href="' . $languageLink . '">';
                            // Display the flag image for the language
                            echo '<img class="classes-img" src="flags/' . $language['country'] . '.png" alt="' . $language['country'] . '" />';
                            // Display the name of the language
                            echo '<h3>' . $language['name'] . '</h3>';
                            // Display the description of the language
                            echo '<p class="classes-box-txt">' . $language['description'] . '</p>';
                            echo '</a>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </article>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Adipisci nisi mollitia iusto deleniti ratione, eius, itaque
                omnis ea rerum corporis nihil impedit dolorem magnam
                sapiente ipsam similique magni qui tempora!
            </p>
        </section>
    </main>
    <script src="JS/script.js"></script>
</body>

</html>