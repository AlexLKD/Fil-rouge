<?php
require 'includes/_database.php';
session_start();

// Check if the 'HTTP_REFERER' key exists in the $_SERVER superglobal and if it contains the expected URL in the $_ENV superglobal.
if (!(array_key_exists('HTTP_REFERER', $_SERVER)) && str_contains($_SERVER['HTTP_REFERER'], $_ENV["URL"])) {
    // If the 'HTTP_REFERER' is missing or does not match the expected URL, redirect to the dashboard with an error message.
    header('Location: pdf_form.php?msg=error_referer');
    exit;
} else if (
    // Check if the 'token' key exists in both the $_SESSION and $_REQUEST superglobals and if their values match.
    !array_key_exists('token', $_SESSION) || !array_key_exists('token', $_REQUEST)
    || $_SESSION['token'] !== $_REQUEST["token"]
) {
    // If the 'token' is missing in either $_SESSION or $_REQUEST, or if their values don't match, it indicates a possible CSRF attack.
    // Perform necessary security measures (e.g., logging, invalidating sessions, blocking requests, etc.).
    // Then, redirect to the dashboard with an error message indicating a potential CSRF attack.
    header('Location: pdf_form.php?msg=error_csrf');
    exit;
}


// Define the directory where the uploaded files will be stored
$target_dir = dirname(__FILE__) . "/files/";
// Get the file type of the uploaded file (in lowercase)
$fileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));

// Check if the file type is not "pdf"
if ($fileType != "pdf") {
    // If the file type is not PDF, display an error message and redirect back to the dashboard with a message
    echo "Sorry, only PDF files are allowed.";
    header('Location: dashboard.php?msg="Sorry, only PDF files are allowed."');
    exit;
}

// Get the form data from the POST request
$title_course = $_POST['title_course'];
$id_difficulty = $_POST['id_difficulty'];
$id_language = $_POST['id_language'];
$id_person_teacher = $_SESSION['user_id']; // Get the ID of the person adding the file

// Get the name of the uploaded file without the directory path
$file_name = preg_replace("/[^a-zA-Z0-9]/", "_", $title_course) . ".pdf";

// Modify the target file path to include the title_course and the PDF extension
$file_path = $target_dir . preg_replace("/[^a-zA-Z0-9]/", "_", $title_course) . ".pdf";

// If the file type is "pdf", move the uploaded file 
// from the temporary location to the modified target directory
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file_path)) {
    // Prepare the query to insert the data into the "course" table
    $query = $dbCo->prepare("INSERT INTO course (id_course, date_course, title_course, 
    id_difficulty, id_person_teacher, id_language, file_name) 
    VALUES (NULL, NOW(), :title_course, :id_difficulty, :id_person_teacher, :id_language, :file_name)");

    // Execute the query with the form data
    $isOk = $query->execute([
        ':title_course' => strip_tags($title_course),
        ':id_difficulty' => strip_tags($id_difficulty),
        ':id_person_teacher' => strip_tags($id_person_teacher), // Insert the teacher's ID
        ':id_language' => strip_tags($id_language),
        ':file_name' => strip_tags($file_name)
    ]);

    // Redirect back to the dashboard with a success message
    header('Location: pdf_form.php?msg=' . urlencode('Le fichier "' . $title_course . '.pdf" a bien été envoyé.'));
    exit;
} else {
    // If there was an error moving the uploaded file, display an error message and redirect back to the dashboard
    header('"Sorry, there was an error uploading your file."');
    exit;
}
