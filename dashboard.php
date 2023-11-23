<?php
require 'includes/_database.php';
session_start();
?>

<body>
    <main>
        <?php
        include 'includes/header.php';
        ?>
        <section class="container">
            <h2>Tableau de bord</h2>
            <?php
            if (!isset($_SESSION['user_id'])) {
                // Redirect the user to the login page if not logged in
                header('Location: login.php');
                exit;
            }
            // Check if the user is logged in and if session data exists
            if (isset($_SESSION['user_id'])) {
                // Assuming you have stored the user information in the session during login
                $user_id = $_SESSION['user_id'];
                $user_name = $_SESSION['user_lastname'];
                $user_firstname = $_SESSION['user_firstname'];
                $user_email = $_SESSION['user_email'];

                // Fetch courses uploaded by the user with type_of_user === 2
                $query = $dbCo->prepare("SELECT c.title_course, c.file_name, l.name, l.country FROM course c
                JOIN difficulty d ON c.id_difficulty = d.id_difficulty
                JOIN languages l ON c.id_language = l.id_language
                WHERE c.id_person_teacher = :user_id");
                $query->execute([':user_id' => $user_id]);
                $uploadedCourses = $query->fetchAll(PDO::FETCH_ASSOC);
            ?>
                <?php if (count($uploadedCourses) >= 0) : ?>
                    <h4>Cours déposés par <?php echo $_SESSION['user_lastname'] . ' ' . $_SESSION['user_firstname'] ?></h4>
                    <ul>
                        <?php foreach ($uploadedCourses as $course) : ?>
                            <li>
                                <div>
                                    <p><?php echo $course['title_course']; ?></p>
                                    <embed src="files/<?php echo $course['file_name']; ?>" width="400" height="500" type="application/pdf">
                                    <!-- <img class="classes-img" src="flags/<?php echo $course['country']; ?>.png" alt="" /> -->
                                </div>
                                <!-- Display other course information as needed -->
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <a class="" href="pdf_form.php"><img class="plus-btn" src="img/plussign" alt=""></a>
                <?php endif; ?>
                <form id="userInfoForm" action="actions.php" method="post">
                    <input type="hidden" name="token" value="<?= $_SESSION['token'] ?? '' ?>">

                    <label for="user_name">Nom:</label>
                    <input type="text" id="user_name" name="user_name" value="<?php echo $user_name; ?>" disabled>

                    <label for="user_firstname">Prénom:</label>
                    <input type="text" id="user_firstname" name="user_firstname" value="<?php echo $user_firstname; ?>" disabled>

                    <label for="user_email">Email:</label>
                    <input type="email" id="user_email" name="user_email" value="<?php echo $user_email; ?>" disabled>

                    <input class="update-btn hidden" type="submit" value="Valider" name="updateInfo">
                </form>
                <button type="button" class="edit-info-btn js-btn-update"><img class="edit-info-icon" src="img/pencil.png" alt=""></button>
            <?php } else {
                echo "<p>Vous devez être connecté pour voir vos informations.</p>";
            }
            ?>
        </section>
    </main>
    <script src="JS/functions.js"></script>
</body>

</html>