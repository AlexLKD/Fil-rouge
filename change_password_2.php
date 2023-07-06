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
    <!-- Pills navs -->
    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item login-password" role="presentation">
            <a class="nav-link active" id="tab-login" href="login.php" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
        </li>
    </ul>
    <!-- Pills navs -->

    <!-- Pills content -->
    <div class="tab-content">
        <div id="pills-register" role="tabpanel" aria-labelledby="tab-register">
            <p class="forgot-password-txt"> Mot de passe oublié ?</p>
            <form>
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="loginPassword" class="form-control" />
                    <label class="form-label" for="loginPassword">Password</label>
                </div>
                <!-- Confirmation password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="loginPassword" class="form-control" />
                    <label class="form-label" for="loginPassword">Confirmation password</label>
                </div>
                <!-- Submit button -->
                <a type="submit" class="btn btn-primary mb-3 continue-btn">
                    Réinitialiser
                </a>
            </form>
        </div>
    </div>
    <!-- Pills content -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
</body>

</html>