<?php
require_once('../db_connect.php');
session_start();
$id = $_SESSION['auth_id'];
$image = $_FILES['testi_image'];
$commnet = htmlspecialchars(trim($_POST['testi_commnet']));
$name = htmlspecialchars(trim($_POST['testi_name']));
$title = htmlspecialchars(trim($_POST['testi_title']));
$status = $_POST['testi_status'];



if ($image['name'] && $commnet && $name && $title) {
    $old_image_name = $image['name'];
    $explode_image = explode('.', $old_image_name);
    $extension = end($explode_image);
    if ($extension === 'png' ||  $extension === 'jpg') {
        if ($image['size'] <= '1000000') {
            $new_image_name = $id . '_' . time() . '.' . $extension;
            $tmp_location = $image['tmp_name'];
            $file_location = "./upload/testimonial/" . $new_image_name;
            move_uploaded_file($tmp_location, $file_location);
            $showcase_query = "INSERT INTO testimonials (image, comment, name, title, status) VALUES ('$new_image_name','$commnet','$name','$title','$status')";
            $showcase_db = mysqli_query($db_connect, $showcase_query);
            header('location:./testimonial_add.php');
            $_SESSION['success'] = 'Your Data Successfully Inserted';
        } else {
            header('location:./testimonial_add.php');
            $_SESSION['size_error'] = 'Your image size must be under 1MB';
        }
    } else {
        header('location:./testimonial_add.php');
        $_SESSION['ext_error'] = 'Your Image must be jpg or png format';
    }
} else {
    header('location:./testimonial_add.php');
    $_SESSION['image_error'] = 'All Field Required*';
}
