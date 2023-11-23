<?php
require 'includes/_database.php';
// require 'includes/_functions.php';
session_start();
?>

<body>
    <?php
    include 'includes/header.php';
    ?>
    <main>
        <?php
        if (isset($_SESSION['type_of_user']) && $_SESSION['type_of_user'] === '2') {
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
                <label>Langue:</label>
                <select class="upload-language-option" name="id_language" required>
                    <?php
                    /**
                     * Retrieve language options from the database and generate HTML options for a dropdown menu.
                     */
                    $query = $dbCo->prepare("SELECT id_language, name FROM languages");
                    $query->execute();
                    $languages = $query->fetchAll();
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
            echo '<p class="upload-course-info" style="display:flex; justify-content: center;">' . $_GET['msg'] . '</p>';
        }
        ?>
    </main>
</body>