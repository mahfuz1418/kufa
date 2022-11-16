<?php
session_start();
require_once('../../db_connect.php');

// Date input from signup.php page  
$name = htmlspecialchars(trim($_POST['user_name']));
$email = htmlspecialchars(trim($_POST['user_email']));
$password = htmlspecialchars($_POST['user_password']);
$confirm_password = htmlspecialchars($_POST['user_confirm_password']);
// email chacking for duplicate email 
$email_check_query = "SELECT COUNT(*) AS 'result' FROM admins WHERE email = '$email'";
$email_check_db = mysqli_query($db_connect, $email_check_query);
$email_check_result = mysqli_fetch_assoc($email_check_db);


$flag = false;

if ($name) {
    $remove_space = str_replace(" ", "", $name);
    if (ctype_alpha($remove_space)) {
        $_SESSION['old_name'] = $name;
    } else {
        $flag = true;
        $_SESSION['name_error'] = 'You type some number';
    }
} else {
    $flag = true;
    $_SESSION['name_error'] = 'Please Write Your Name';
}

if ($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if ($email_check_result['result']) {
            $flag = true;
            $_SESSION['email_error'] = 'This email already in out database';
        } 
        $_SESSION['old_email'] = $email;
    }
} else {
    $flag = true;
    $_SESSION['email_error'] = 'Please Write Your Email';
};

if ($password) {
    if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $password)) {
        $flag = true;
        $_SESSION['pass_not_matched'] = 'For stronger password you may use capital and small letter, number, and symbol';
    }
} else {
    $flag = true;
    $_SESSION['pass_error'] = 'Please Enter Your Password';
};





if ($confirm_password) {
    if ($password === $confirm_password) {
    } else {
        $flag = true;
        $_SESSION['con_pass_error'] = 'Does not match password';
    }
} else {
    $flag = true;
    $_SESSION['con_pass_error'] = '';
}





if ($flag) {
    header('location:./signup.php');
} else {
    $password_encode = sha1($password);
    $admin_query = "INSERT INTO admins (name,email,password) VALUES ('$name','$email','$password_encode')";
    mysqli_query($db_connect, $admin_query);
    $_SESSION['acc_created'] = 'Hi '.$name.'. Your account succesfully created.';
    header('location: ./signin.php');
}
