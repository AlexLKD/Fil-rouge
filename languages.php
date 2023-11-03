<?php
require 'includes/_database.php';
require 'includes/_functions.php';
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
                displayLanguages();
                ?>
            </div>
        </section>
    </main>
    <script src="script.js"></script>
</body>

</html>