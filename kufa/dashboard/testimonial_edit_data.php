<?php
require_once('../db_connect.php');
session_start();
$id_auth = $_SESSION['auth_id'];
$id = $_POST['id'];
$image = $_FILES['testi_image'];
$commnet = htmlspecialchars(trim($_POST['testi_commnet']));
$name = htmlspecialchars(trim($_POST['testi_name']));
$title = htmlspecialchars(trim($_POST['testi_title']));
$status = $_POST['testi_status'];



if ($image['name'] || $commnet || $name || $title) {
    $old_image_name = $image['name'];
    $explode_image = explode('.', $old_image_name);
    $extension = end($explode_image);
    if ($extension === 'png' ||  $extension === 'jpg') {
        if ($image['size'] <= '1000000') {
            $new_image_name = $id_auth . '_' . time() . '.' . $extension;
            $tmp_location = $image['tmp_name'];
            $file_location = "./upload/testimonial/" . $new_image_name;
            move_uploaded_file($tmp_location, $file_location);
            $showcase_query = "UPDATE `testimonials` SET `image`='$new_image_name',`comment`='$commnet',`name`='$name ',`title`='$title',`status`='$status' WHERE id = $id";
            $showcase_db = mysqli_query($db_connect, $showcase_query);
            header('location:./testimonial_list.php');
        } else {
            header('location:./testimonial_edit.php');
            $_SESSION['size_error'] = 'Your image size must be under 1MB';
        }
    } else {
        header('location:./testimonial_edit.php');
        $_SESSION['ext_error'] = 'Your Image must be jpg or png format';
    }
    $showcase_query = "UPDATE `testimonials` SET `comment`='$commnet',`name`='$name ',`title`='$title',`status`='$status' WHERE id = $id";
    $showcase_db = mysqli_query($db_connect, $showcase_query);
    header('location:./testimonial_list.php');
} else {
    header('location:./testimonial_edit.php');
    $_SESSION['image_error'] = 'All Field Required*';
}
