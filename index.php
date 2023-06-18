<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    include 'header.php';
    // echo $header;
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
                        $country = ['uk', 'spain', 'germany', 'japan', 'korea', 'russia'];
                        $language = ['Anglais', 'Espagnol', 'Allemand', 'Japonais', 'Coréen', 'Russe'];
                        $description = [
                            'English, Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia nam illum odio reiciendis necessitatibus!',
                            'Spanish, Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia nam illum odio reiciendis necessitatibus!',
                            'German, Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia nam illum odio reiciendis necessitatibus!',
                            'Japanese, Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia nam illum odio reiciendis necessitatibus!',
                            'Korean, Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia nam illum odio reiciendis necessitatibus!',
                            'Russian, Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia nam illum odio reiciendis necessitatibus!'
                        ];

                        for ($i = 0; $i < count($country); $i++) {
                            echo '<div class="classes-box">';
                            echo '<a href="#">';
                            echo '<img class="classes-img" src="flags/' . $country[$i] . '.png" alt="' . $country[$i] . '" />';
                            echo '<h3>' . $language[$i] . '</h3>';
                            echo '<p class="classes-box-txt">';
                            echo $description[$i];
                            echo '</p>';
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
    <script src="script.js"></script>
</body>

</html>