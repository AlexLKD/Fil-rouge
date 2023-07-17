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
