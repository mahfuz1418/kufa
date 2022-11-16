<?php
require_once('../db_connect.php');
session_start();
$id = $_SESSION['auth_id'];
$brand_name = htmlspecialchars(trim($_POST['brand_name']));
$brand_image = $_FILES['brand_image'];


if ($brand_image['name'] && $brand_name ) {
    $old_image_name = $brand_image['name'];
    $explode_image = explode('.', $old_image_name);
    $extension = end($explode_image);

    if ($extension === 'png') {
        if ($brand_image['size'] <= '1000000') {
            $new_image_name = $id . '_' . time() . '.' . $extension;
            $tmp_location = $brand_image['tmp_name'];
            $file_location = "./upload/brands/" . $new_image_name;
            move_uploaded_file($tmp_location, $file_location);
            $brand_query = "INSERT INTO `brands`(`brand_name`, `brand_logo`) VALUES ('$brand_name','$new_image_name')";
            $brand_db = mysqli_query($db_connect, $brand_query);
            header('location:./brands.php');
            $_SESSION['brand_success'] = 'Your Data Successfully Inserted';
        } else {
            header('location:./brands.php');
            $_SESSION['size_error'] = 'Your image size must be under 1MB';
        }
    } else {
        header('location:./brands.php');
        $_SESSION['ext_error'] = 'Your Image must be png format';
    }
} else {
    header('location:./brands.php');
    $_SESSION['required'] = 'All Field Required*';
}
