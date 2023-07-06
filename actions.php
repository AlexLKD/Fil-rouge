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


// if (isset($_POST['submit'])) {
//     $firstname = $_POST['registerFirstName'];
//     $lastname = $_POST['registerLastName'];
//     $email = $_POST['registerEmail'];
//     $password = $_POST['registerPassword'];

//     // Crypter le mot de passe
//     $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

//     // Effectuer la requête d'insertion
//     $query = $dbCo->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)");
//     $isOk = $query->execute([
//         ':firstname' => $firstname,
//         ':lastname' => $lastname,
//         ':email' => $email,
//         ':password' => $hashedPassword
//     ]);

//     header('Location: login.php?msg=' . ($isOk ? 'User ajouté' : 'y\'a un souci'));
//     exit;
// }

if (isset($_POST['submit'])) {
    $firstName = $_POST['registerFirstName'];
    $lastName = $_POST['registerLastName'];
    $email = $_POST['registerEmail'];
    $password = $_POST['registerPassword'];
    $repeatPassword = $_POST['registerRepeatPassword'];
    $typeOfUser = '';

    if (isset($_POST['submit'])) {
        // ...

        $roleStudent = isset($_POST['roleStudent']);
        $roleTeacher = isset($_POST['roleTeacher']);
        if ($roleStudent && !$roleTeacher) {
            $typeOfUser = '1'; // student
        } elseif (!$roleStudent && $roleTeacher) {
            $typeOfUser = '2'; // teacher
        } else {
            $errorTypeOfUser = 'Veuillez sélectionner une seule option (Étudiant ou Professeur).';
        }
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
