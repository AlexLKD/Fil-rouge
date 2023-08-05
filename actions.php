<?php
require 'includes/_database.php';
session_start();
print_r($_POST);

if (!(array_key_exists('HTTP_REFERER', $_SERVER)) && str_contains($_SERVER['HTTP_REFERER'], $_ENV["URL"])) {
    header('Location: index.php?msg=error_referer');
    exit;
} else if (!array_key_exists('token', $_SESSION) || !array_key_exists('token', $_REQUEST) || $_SESSION['token'] !== $_REQUEST["token"]) {
    //...
    header('Location: index.php?msg=error_csrf');
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

// Load the .env file
require_once 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Get the form data
if (isset($_POST['login'])) {
    $emailOrUsername = $_POST['loginName'];
    $password = $_POST['loginPassword'];

    // Create a PDO connection using the .env variables
    try {
        $dbCo = new PDO(
            $_ENV['DB_HOST'],
            $_ENV['DB_USER'],
            $_ENV['DB_PASSWORD']
        );
        $dbCo->setAttribute(
            PDO::ATTR_DEFAULT_FETCH_MODE,
            PDO::FETCH_ASSOC
        );
    } catch (Exception $e) {
        die('Unable to connect to the database.
            ' . $e->getMessage());
    }

    // Prepare the query with a placeholder
    $query = $dbCo->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");

    // Execute the query with the parameter
    $query->execute([$emailOrUsername]);

    // Fetch the user data
    $user = $query->fetch();

    // Check if a row is returned
    if ($user) {
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, user is valid
            $_SESSION['user_id'] = $user['id_person'];
            $_SESSION['user_firstname'] = $user['firstname'];
            $_SESSION['user_lastname'] = $user['lastname'];
            $_SESSION['type_of_user'] = $user['type_of_user'];
            $_SESSION['user_email'] = $user['email'];
            // ... store other user data in session if needed

            // Redirect to the dashboard or other authenticated pages
            header('Location: index.php');
            exit();
        } else {
            header('Location: login.php?msg="Mot de passe incorrect"');
            exit();
        }
    } else {
        header('Location: login.php?msg="Utilisateur introuvable"');
    }

    // Close the connection
    $dbCo = null;
}

if (isset($_POST['updateInfo'])) {
    // Get the form data
    $user_id = $_SESSION['user_id'];
    $user_name = $_POST['user_name'];
    $user_firstname = $_POST['user_firstname'];
    $user_email = $_POST['user_email'];

    // Prepare the query to update user information in the database
    $query = $dbCo->prepare("UPDATE users SET lastname = :user_name, firstname = :user_firstname, email = :user_email WHERE id_person = :user_id");
    $query->execute([
        ':user_name' => $user_name,
        ':user_firstname' => $user_firstname,
        ':user_email' => $user_email,
        ':user_id' => $user_id
    ]);

    // Update the session variables with the new values
    $_SESSION['user_lastname'] = $user_name;
    $_SESSION['user_firstname'] = $user_firstname;
    $_SESSION['user_email'] = $user_email;

    // Redirect the user back to the profile page or any other page after the update
    header('Location: dashboard.php?msg="Informations mises à jour avec succès."');
    exit;
}
