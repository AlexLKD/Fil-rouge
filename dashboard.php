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
                $query = $dbCo->prepare("SELECT * FROM course WHERE id_person_teacher = :user_id");
                $query->execute([':user_id' => $user_id]);
                $uploadedCourses = $query->fetchAll(PDO::FETCH_ASSOC);
            ?>
                <?php if (count($uploadedCourses) > 0) : ?>
                    <h4>Courses Uploaded by You </h4>
                    <ul>
                        <?php foreach ($uploadedCourses as $course) : ?>
                            <li><?php echo $course['title_course']; ?></li>
                            <!-- Display other course information as needed -->
                        <?php endforeach; ?>
                    </ul>
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