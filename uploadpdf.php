<?php
require 'includes/_database.php';
session_start();

if (!(array_key_exists('HTTP_REFERER', $_SERVER)) && str_contains($_SERVER['HTTP_REFERER'], $_ENV["URL"])) {
    header('Location: dashboard.php?msg=error_referer');
    exit;
} else if (!array_key_exists('token', $_SESSION) || !array_key_exists('token', $_REQUEST) || $_SESSION['token'] !== $_REQUEST["token"]) {
    //...
    header('Location: dashboard.php?msg=error_csrf');
    exit;
}

// Define the directory where the uploaded files will be stored
$target_dir = dirname(__FILE__) . "/files/";
// Get the target file path by combining the target directory with the basename of the uploaded file
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// Get the file type of the uploaded file (in lowercase)
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if the file type is not "pdf"
if ($fileType != "pdf") {
    // If the file type is not PDF, display an error message and redirect back to the dashboard with a message
    echo "Sorry, only PDF files are allowed.";
    header('Location: dashboard.php?msg="Sorry, only PDF files are allowed."');
    exit;
}
// If the file type is "pdf", move the uploaded file from the temporary location to the target directory
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    // Get the form data from the POST request
    $title_course = $_POST['title_course'];
    $id_difficulty = $_POST['id_difficulty'];
    $id_languages = $_POST['id_languages'];
    // Get the name of the uploaded file
    $file_name = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
    // Prepare the query to insert the data into the "course" table
    $query = $dbCo->prepare("INSERT INTO course (id_course, date_course, title_course, 
    id_difficulty, id_languages, file_name) 
    VALUES (NULL, NOW(), :title_course, :id_difficulty, :id_languages, :file_name)");
    // Execute the query with the form data
    $isOk = $query->execute([
        ':title_course' => $title_course,
        ':id_difficulty' => $id_difficulty,
        ':id_languages' => $id_languages,
        ':file_name' => $file_name
    ]);
    // Redirect back to the dashboard with a success message
    header('Location: dashboard.php?msg=' . urlencode('The file "' .
        htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . '" has been uploaded.'));
    exit;
} else {
    // If there was an error moving the uploaded file, display an error message and redirect back to the dashboard
    header('"Sorry, there was an error uploading your file."');
    exit;
}
