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
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
        </li>
    </ul>

    <!-- Pills content -->
    <div class="tab-content">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
            <form>
                <input type="hidden" name="token" value="<?= $_SESSION['token'] ?? '' ?>">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="loginName" class="form-control" />
                    <label class="form-label" for="loginName">Email or username</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="loginPassword" class="form-control" />
                    <label class="form-label" for="loginPassword">Password</label>
                </div>

                <!-- 2 column grid layout -->
                <div class="row mb-4">
                    <div class="col-md-6 d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-3 mb-md-0">
                            <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                            <label class="form-check-label" for="loginCheck">
                                Remember me
                            </label>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex justify-content-center">
                        <!-- Simple link -->
                        <a href="change_password.php">Forgot password?</a>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">
                    Sign in
                </button>
            </form>
        </div>
        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
            <form action="actions.php" method="POST" class="form-submit">
                <input type="hidden" name="token" value="<?= $_SESSION['token'] ?? '' ?>">

                <!-- Firstname input -->
                <div class="form-outline mb-4">
                    <input type="text" id="registerFirstName" class="form-control" name="registerFirstName" required />
                    <label class="form-label" for="registerFirstName">First name</label>
                </div>

                <!-- Lastname input -->
                <div class="form-outline mb-4">
                    <input type="text" id="registerLastName" class="form-control" name="registerLastName" required />
                    <label class="form-label" for="registerLastName">Last name</label>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="registerEmail" class="form-control" name="registerEmail" required />
                    <label class="form-label" for="registerEmail">Email</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="registerPassword" class="form-control" name="registerPassword" required />
                    <label class="form-label" for="registerPassword">Password</label>
                </div>

                <!-- Repeat Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="registerRepeatPassword" class="form-control" name="registerRepeatPassword" required />
                    <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                </div>
                <?php if (isset($errorPassword)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $errorPassword ?>
                    </div>
                <?php endif; ?>

                <!-- radio teacher/student-->
                <p class="d-flex justify-content-center"> Vous êtes :</p>
                <div class="d-flex justify-content-center">
                    <div class="form-check form-check-inline">
                        <input type="hidden" name="roleStudent">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="registerStudent" checked value="registerStudent" />
                        <label class="form-check-label" for="registerStudent">Etudiant</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input type="hidden" name="roleTeacher">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="registerTeacher" value="registerTeacher" />
                        <label class="form-check-label" for="registerTeacher">Professeur</label>
                    </div>
                </div>
                <?php if (isset($errorTypeOfUser)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $errorTypeOfUser ?>
                    </div>
                <?php endif; ?>

                <!-- Checkbox terms-->
                <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input me-2" type="checkbox" value="" id="registerTerms" checked aria-describedby="registerCheckHelpText" required />
                    <label class="form-check-label" for="registerTerms">
                        I have read and agree to the terms
                    </label>
                </div>


                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary btn-block mb-3">Register</button>
            </form>
        </div>
    </div>
    <!-- Pills content -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
</body>

</html>