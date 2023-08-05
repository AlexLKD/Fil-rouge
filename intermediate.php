<?php
require 'includes/_database.php';
session_start();
?>

<body>
    <?php
    include 'includes/header.php';
    ?>
    <main>
        <section class="container">
            <?php
            if (isset($_GET['country']) && isset($_GET['difficulty']) && $_GET['difficulty'] === 'intermédiaire') {
                $languageName = $_GET['country'];

                // Prepare the query to fetch beginner courses for the selected language
                $query = $dbCo->prepare("SELECT c.*, l.name AS name FROM course c JOIN languages l ON c.id_language = l.id_language WHERE c.id_difficulty = 2 AND l.country = :languageName");
                $query->execute([':languageName' => $languageName]);
                $courses = $query->fetchAll(PDO::FETCH_ASSOC);

                // Check if there are any courses
                if (count($courses) > 0) {
                    echo '<h2>' . ucfirst($courses[0]['name']) . ": " . ucfirst($_GET['difficulty']) . '</h2>';
                    // Display the courses
                    foreach ($courses as $course) {
                        echo '<div class="course-box">';
                        echo '<h3>' . $course['title_course'] . '</h3>';
                        echo '<a class="course-pdf" href="files/' . $course['file_name'] . '" target="_blank">';
                        echo '<img class="course-icon" src="img/pdf_icon.png" alt="">';
                        echo '</a>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No courses found for this language and difficulty.</p>';
                }
            } else {
                // Handle the case when the URL parameters are missing or incorrect
                header('Location: language.php');
                exit;
            }
            ?>
        </section>
    </main>
</body>