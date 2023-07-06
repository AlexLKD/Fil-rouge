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


if (isset($_POST['submit'])) {
    $firstname = $_POST['registerFirstName'];
    $lastname = $_POST['registerLastName'];
    $email = $_POST['registerEmail'];
    $password = $_POST['registerPassword'];

    // Crypter le mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Effectuer la requête d'insertion
    $query = $dbCo->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)");
    $isOk = $query->execute([
        ':firstname' => $firstname,
        ':lastname' => $lastname,
        ':email' => $email,
        ':password' => $hashedPassword
    ]);

    header('Location: index.php?msg=' . ($isOk ? 'User ajouté' : 'y\'a un souci'));
    exit;
}
