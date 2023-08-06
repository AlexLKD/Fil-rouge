<?php
require 'includes/_database.php';
// require 'includes/_functions.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="CSS/login_style.css" />
</head>

<body>
    <?php
    include 'includes/header.php';
    ?>
    <main>
        <?php
        if (isset($_SESSION['type_of_user']) && $_SESSION['type_of_user'] === 2) {
            // Assuming you have stored the PDO connection in $pdo variable
        ?>
            <form class="upload-form" action="uploadpdf.php" method="post" enctype="multipart/form-data">
                <input class="upload-ttl" type="text" name="title_course" placeholder="Title of the Course" required>

                <input type="hidden" name="token" value="<?= $_SESSION['token'] ?? '' ?>">

                <label>Difficulté :</label>
                <div class="upload-difficulty">
                    <input type="radio" name="id_difficulty" value="1" required> Débutant
                    <input type="radio" name="id_difficulty" value="2" required> Intermédiaire
                    <input type="radio" name="id_difficulty" value="3" required> Expert
                </div>
                <label>Langage:</label>
                <select class="upload-language-option" name="id_language" required>
                    <?php
                    $query = $pdo->prepare("SELECT id_language, name FROM languages");
                    $query->execute();
                    $languages = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($languages as $language) {
                        echo '<option value="' . $language['id_language'] . '">' . $language['name'] . '</option>';
                    }
                    ?>
                </select>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input class="upload-btn" type="submit" value="Envoyer le cours" name="submit">
            </form>
        <?php
        } else {
            // Display a message for users who are not teachers
            echo "You must be a teacher to access this page.";
        }
        ?>
        <?php
        if (array_key_exists('msg', $_GET)) {
            echo '<p class="upload-course-info">' . $_GET['msg'] . '</p>';
        }
        ?>
    </main>
</body>