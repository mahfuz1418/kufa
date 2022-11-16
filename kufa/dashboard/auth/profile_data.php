<?php
session_start();
require_once('../../db_connect.php');
$name = htmlspecialchars(trim($_POST['user_name']));
$id = htmlspecialchars($_SESSION['auth_id']);

$flag = false;

// update name section 
if (isset($_POST['update_name'])) {
    if ($name) {
        $remove_space = str_replace(" ", "", $name);
        if (ctype_alpha($remove_space)) {
        } else {
            $flag = true;
            $_SESSION['name_error'] = 'You can not use number in your name';
        }
    } else {
        $flag = true;
        $_SESSION['name_error'] = 'Please Write Your New Name';
    }
}


// update password section 
if (isset($_POST['update_pass'])) {
    $current_password = htmlspecialchars($_POST['current_password']) ;
    $new_password = htmlspecialchars($_POST['new_password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);
    if ($current_password) {
        $current_pass_check_query = "SELECT password FROM admins WHERE id = '$id'";
        $current_pass_check_db = mysqli_query($db_connect, $current_pass_check_query);
        $current_pass_check_result = mysqli_fetch_assoc($current_pass_check_db);
        if (sha1($current_password) === $current_pass_check_result['password']) {
            if ($new_password) {
                if (preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $new_password)) {
                    if ($current_password === $new_password) {
                        $flag = true;
                        $_SESSION['new_pass_error'] = "Current password and new password same";
                    } else {
                        if ($confirm_password) {
                            if ($new_password === $confirm_password) {
                                // password update query started 
                                $password_encode = sha1($new_password);
                                $chage_password_query = "UPDATE admins SET password = '$password_encode' WHERE id = '$id'";
                                $change_password_db = mysqli_query($db_connect, $chage_password_query);
                                $flag = true;
                                $_SESSION['pass_updated'] = "Password Succesfully Changed !";
                            } else {
                                $flag = true;
                                $_SESSION['con_pass_error'] = "New password and confirm password doesn't match";
                            }
                        } else {
                            $flag = true;
                            $_SESSION['con_pass_error'] = "Re enter your password";
                        }
                    }
                } else {
                    $flag = true;
                    $_SESSION['new_pass_error'] = "For stronger password you may use letter, number and symbol";
                }
            } else {
                $flag = true;
                $_SESSION['new_pass_error'] = "Please input your new passwod";
            }
        } else {
            $flag = true;
            $_SESSION['current_pass_error'] = "Current password doesn't match";
        }
    } else {
        $flag = true;
        $_SESSION['current_pass_error'] = 'Please input your old password';
    }
}

// UPLOAD PROFILE PICTURE

if (isset($_POST['update_profile'])) {
    if ($_FILES['profile_pic']['name'] != '') {
        $image_name = $_FILES['profile_pic']['name'];
        $explode_img_name = explode('.', $image_name);
        $extension = end($explode_img_name);
        $new_img_name = $id . '.' . $extension;
        $temp_path = $_FILES['profile_pic']['tmp_name'];
        $file_path = '../upload/profile/' . $new_img_name;
        move_uploaded_file($temp_path, $file_path);

        // IMAGE UPDATE QUERY

        $chage_profile_query = "UPDATE admins SET profile_pic = '$new_img_name' WHERE id = '$id'";
        $change_profile_db = mysqli_query($db_connect, $chage_profile_query);
        header('location:../profile.php');
        $_SESSION['profile_updated'] = "Profile Picture Succesfully Uploaded !";
    } else {
        header('location:../profile.php');
        $_SESSION['profile_updated_error'] = "Please Select Your Image!";
    }
}

// UPDATE PHONE NUMBER 
if (isset($_POST['update_phone_number'])) {
    $phone_number = htmlspecialchars($_POST['phone_number']);
    if ($phone_number) {
        $update_number_query = "UPDATE admins SET phone_number = '$phone_number' WHERE id = '$id'";
        $update_number_db = mysqli_query($db_connect, $update_number_query);
        header('location:../profile.php');
        $_SESSION['number_updated'] = "Phone Number updated successfully !";
    } else {
        $_SESSION['number_error'] = "Please enter your phone number";
        header('location:../profile.php');
    }
}

// UPDATE ADDRESS 
if (isset($_POST['update_address'])) {
    $address = htmlspecialchars($_POST['address']);
    if ($address) {
        $update_address_query = "UPDATE admins SET address = '$address' WHERE id = '$id'";
        $update_address_db = mysqli_query($db_connect, $update_address_query);
        header('location:../profile.php');
        $_SESSION['address_updated'] = "Address updated successfully !";
    } else {
        $_SESSION['address_error'] = "Please enter your address";
        header('location:../profile.php');
    }
}



if ($flag) {
    header('location:../profile.php');
} elseif (isset($_POST['update_name'])) {
    $chage_name_query = "UPDATE admins SET name = '$name' WHERE id = '$id'";
    $change_name_db = mysqli_query($db_connect, $chage_name_query);
    $_SESSION['auth_name'] = $name;
    header('location:../profile.php');
    $_SESSION['name_updated'] = "Name Succesfully Updated !";
}
