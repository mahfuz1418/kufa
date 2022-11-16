<?php require_once('../includes/header.php');
session_start(); 
?>

<body>
    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">

            <form action="./signup_data.php" method="post">
                <div class="logo">
                    <a href="index.html">Neptune</a>
                </div>
                <p class="auth-description"><a href="./signin.php">Sign In</a></p>

                <div class="auth-credentials m-b-xxl">
                    <label for="signUpUsername" class="form-label">Name</label>
                    <input type="text" class="form-control m-b-md mb-0 <?= isset($_SESSION['name_error']) ? "is-invalid" : "" ?>" id="signUpUsername" aria-describedby="signUpUsername" placeholder="Enter Name" name="user_name" value="<?= isset($_SESSION['old_name'])? $_SESSION['old_name'] : ''; unset($_SESSION['old_name']) ?>">
                        
                    <?php
                    if (isset($_SESSION['name_error'])) { ?>
                        <p class="text-danger"><?= $_SESSION['name_error'] ?></p>
                    <?php
                    }
                    unset($_SESSION['name_error']);
                    ?>

                    <label for="signUpEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control m-b-md mb-0 <?= isset($_SESSION['email_error']) ? "is-invalid" : "" ?>" id="signUpEmail" aria-describedby="signUpEmail" placeholder="example@neptune.com" name="user_email" value="<?= isset($_SESSION['old_email'])? $_SESSION['old_email'] : ''; unset($_SESSION['old_email']) ?>">
                    <?php
                    if (isset($_SESSION['email_error'])) { ?>
                        <p class="text-danger"><?= $_SESSION['email_error'] ?></p>
                    <?php
                    }
                    unset($_SESSION['email_error']);
                    ?>
                    
                    <div>
                        <div class="row">
                            <div class="col-8">
                                <label for="signUpPassword" class="form-label">Password</label>
                                <input type="password" class="form-control <?= isset($_SESSION['pass_error']) ? "is-invalid" : "" ?>" id="signUpPassword" aria-describedby="signUpPassword" name="user_password">
                            </div>
                            <div class="col-4">
                                <label for="chkpass" class="pt-4 mt-4"><input type="checkbox" onclick="myFunction()" id="chkpass">Show Password</label>
                            </div>
                        </div>
                    </div>

                    <!-- show and hide passwor  -->
                    <script>
                        function myFunction() {
                            var x = document.getElementById("signUpPassword");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>
                    <!-- password condition  -->
                    <?php
                    if (isset($_SESSION['pass_not_matched'])) { ?>
                        <p class="text-danger"><?= $_SESSION['pass_not_matched'] ?></p>
                    <?php

                    }
                    unset($_SESSION['pass_not_matched']);
                    ?>
                    <!-- password error  -->
                    <?php
                    if (isset($_SESSION['pass_error'])) { ?>
                        <p class="text-danger"><?= $_SESSION['pass_error'] ?></p>
                    <?php
                    }
                    unset($_SESSION['pass_error']);
                    ?>





                    <label for="signUpPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control <?= isset($_SESSION['con_pass_error']) ? "is-invalid" : "" ?>" id="signUpPassword" aria-describedby="signUpPassword" name="user_confirm_password">
                    <?php
                    if (isset($_SESSION['con_pass_error'])) { ?>
                        <p class="text-danger"><?= $_SESSION['con_pass_error'] ?></p>
                    <?php
                    }
                    unset($_SESSION['con_pass_error']);
                    ?>
                </div>

                <div class="auth-submit">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
            </form>

        </div>
    </div>

    <?php require_once('../includes/footer.php') ?>