<?php
require 'includes/_database.php';
session_start();

if (!(array_key_exists('HTTP_REFERER', $_SERVER)) && str_contains($_SERVER['HTTP_REFERER'], $_ENV["URL"])) {
    header('Location: index.php?msg=error_referer');
    exit;
} else if (!array_key_exists('token', $_SESSION) || !array_key_exists('token', $_REQUEST) || $_SESSION['token'] !== $_REQUEST["token"]) {
    //...
    header('Location: index.php?msg=error_csrf');
    exit;
}

$target_dir = dirname(__FILE__) . "/files/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if ($fileType != "pdf") {
    echo "Sorry, only PDF files are allowed.";
    header('Location: dashboard.php?msg="Sorry, only PDF files are allowed."');
    exit;
}
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    header('Location: dashboard.php?msg=' . urlencode('The file "' . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . '" has been uploaded.'));
    exit;
} else {
    header('"Sorry, there was an error uploading your file."');
    exit;
}


if (isset($_POST['submit'])) {
    $firstName = $_POST['registerFirstName'];
    $lastName = $_POST['registerLastName'];
    $email = $_POST['registerEmail'];
    $password = $_POST['registerPassword'];
    $repeatPassword = $_POST['registerRepeatPassword'];
    $typeOfUser = '';

    $roleStudent = isset($_POST['inlineRadioOptions']) && $_POST['inlineRadioOptions'] === 'registerStudent';
    $roleTeacher = isset($_POST['inlineRadioOptions']) && $_POST['inlineRadioOptions'] === 'registerTeacher';
    if ($roleStudent && !$roleTeacher) {
        $typeOfUser = '1'; // student
    } elseif (!$roleStudent && $roleTeacher) {
        $typeOfUser = '2'; // teacher
    } else {
        $errorTypeOfUser = 'Veuillez sélectionner une option (Étudiant ou Professeur).';
    }

    if ($password !== $repeatPassword) {
        $errorPassword = 'Les mots de passe ne correspondent pas.';
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = $dbCo->prepare("INSERT INTO users (firstname, lastname, email, password, type_of_user) VALUES (:firstName, :lastName, :email, :password, :typeOfUser)");
        $isOk = $query->execute([
            ':firstName' => strip_tags($firstName),
            ':lastName' => strip_tags($lastName),
            ':email' => strip_tags($email),
            ':password' => $hashedPassword,
            ':typeOfUser' => $typeOfUser
        ]);
        header('Location: login.php?msg=' . ($isOk ? 'User ajouté' : 'y\'a un souci'));
        exit;
    }
}
