<?php
require_once('../db_connect.php');
session_start();
$id = $_SESSION['auth_id'];
$title = htmlspecialchars(trim($_POST['showcase_title']));
$heading = htmlspecialchars(trim($_POST['showcase_heading']));
$description = htmlspecialchars(trim($_POST['showcase_description']));
$status = $_POST['showcase_status'];
$image = $_FILES['showcase_image'];


if ($image['name'] && $title && $heading && $description) {
    $old_image_name = $image['name'];
    $explode_image = explode('.', $old_image_name);
    $extension = end($explode_image);
    if ($extension === 'png' ||  $extension === 'jpg') {
        if ($image['size'] <= '1000000') {
            $new_image_name = $id . '_' . time() . '.' . $extension;
            $tmp_location = $image['tmp_name'];
            $file_location = "./upload/showcase/" . $new_image_name;
            move_uploaded_file($tmp_location, $file_location);
            $showcase_query = "INSERT INTO showcases (showcase_title, showcase_heading, showcase_description, showcase_image, showcase_status) VALUES ('$title','$heading','$description','$new_image_name','$status')";
            $showcase_db = mysqli_query($db_connect, $showcase_query);
            header('location:./showcase_add.php');
            $_SESSION['success'] = 'Your Data Successfully Inserted';
        } else {
            header('location:./showcase_add.php');
            $_SESSION['size_error'] = 'Your image size must be under 1MB';
        }
    } else {
        header('location:./showcase_add.php');
        $_SESSION['ext_error'] = 'Your Image must be jpg or png format';
    }
} else {
    header('location:./showcase_add.php');
    $_SESSION['image_error'] = 'All Field Required*';
}
