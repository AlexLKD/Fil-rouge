<?php
require 'includes/_database.php';
// require 'includes/_functions.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="CSS/style.css" />
    <link rel="stylesheet" href="CSS/login_style.css" />
</head>

<body>
    <?php
    include 'includes/header.php';
    ?>
    <main>
        <form action="uploadpdf.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="token" value="<?= $_SESSION['token'] ?? '' ?>">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload PDF" name="submit">
        </form>
        <?php
        if (array_key_exists('msg', $_GET)) {
            echo '<p class="task-info">' . $_GET['msg'] . '</p>';
        }
        ?>
    </main>
</body>