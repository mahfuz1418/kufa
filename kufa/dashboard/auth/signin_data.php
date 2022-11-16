<?php
    require_once('../../db_connect.php');
    session_start();
    
    

    $email = htmlspecialchars(trim($_POST['user_email']));
    $password = htmlspecialchars(sha1($_POST['user_password']));
    $email_password_check_query = "SELECT COUNT(*) AS 'result' FROM admins WHERE email = '$email' AND password = '$password'";
    $email_password_check_db = mysqli_query($db_connect, $email_password_check_query);
    $email_password_check_result = mysqli_fetch_assoc($email_password_check_db);
    
    $name_id_query = "SELECT id,name FROM admins WHERE email = '$email'";
    $name_id_db = mysqli_query($db_connect, $name_id_query);
    $name_id_result = mysqli_fetch_assoc($name_id_db);
    $name =  $name_id_result['name'];
    $id = $name_id_result['id'];
   

    if (!$email) {
        $flag = true;
        $_SESSION['email_error_field'] = 'Please input your E-mail';
    } 

    // if ($password) {
    //     echo "okay";
    // }else {
    //     $flag = true;
    //     $_SESSION['pass_error_field'] = 'Please input your Password';
    // }

    if ($email_password_check_result['result']) {
        $_SESSION['auth_mail'] = $email;
        $_SESSION['auth_name'] = $name;
        $_SESSION['auth_id'] = $id;
        header('location:../home.php');
    } else {
        $_SESSION['login_error'] = 'Invalid email or password';
        header('location:./signin.php');
    }
    

   
?>