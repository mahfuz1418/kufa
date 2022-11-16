<?php
require_once('../includes/header.php');
session_start();

?>


<body>
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>


        <div class="app-auth-container">


            <div class="logo">
                <a href="home.php">Neptune</a>
            </div>
            <p class="auth-description">Please sign-in to your account and continue to the dashboard.<br>Don't have an account? <a href="./signup.php">Sign Up</a></p>
            <?php
            if (isset($_SESSION['acc_created'])) : ?>
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <p ><?= $_SESSION['acc_created'] ?></p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                
            endif
            ?>

            <?php
            if (isset($_SESSION['login_error'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show " role="alert">
                    <p ><?= $_SESSION['login_error'] ?></p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                
            endif
            ?>

            <form method="POST" action="./signin_data.php">
                <div class="auth-credentials m-b-xxl">
                    <label for="signInEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control <?=isset($_SESSION['email_error_field'])? 'is-invalid': ''?>" id="signInEmail" aria-describedby="signInEmail" placeholder="example@neptune.com" name="user_email">
                    <?php
                    if (isset($_SESSION['email_error_field'])) { ?>
                        <p class="text-danger"><?= $_SESSION['email_error_field'] ?></p>
                    <?php
                    }

                    ?>

                    <label for="signInPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="signInPassword" aria-describedby="signInPassword" name="user_password">
                    <?php
                    if (isset($_SESSION['pass_error_field'])) { ?>
                        <p class="text-danger"><?= $_SESSION['pass_error_field'] ?></p>
                    <?php
                    }

                    ?>
                </div>

                <div class="auth-submit">
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
            </form>


        </div>
    </div>

    <?php
    require_once('../includes/footer.php');
    session_unset();
    ?>