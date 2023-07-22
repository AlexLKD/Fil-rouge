<?php
require 'includes/_database.php';
// require 'includes/_functions.php';
session_start();
?>


<body>
    <?php
    include 'includes/header.php';
    ?>
    <style>
        <?php include 'CSS/login_style.css'; ?>
    </style>
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
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="registerEmail" class="form-control" />
                    <label class="form-label" for="registerEmail">Email</label>
                </div>
                <!-- Submit button -->
                <a href="change_password_2.php" class="btn btn-primary mb-3 continue-btn">
                    Continuer
                </a>
            </form>
        </div>
    </div>
    <!-- Pills content -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
</body>

</html>