<?php
require_once('../db_connect.php');
session_start();
$id_auth = $_SESSION['auth_id'];
$id = $_POST['id'];
$title = htmlspecialchars(trim($_POST['showcase_title']));
$heading = htmlspecialchars(trim($_POST['showcase_heading']));
$description = htmlspecialchars(trim($_POST['showcase_description']));
$status = $_POST['showcase_status'];
$image = $_FILES['showcase_image'];


if ($image['name'] || $title || $heading || $description) {
    $old_image_name = $image['name'];
    $explode_image = explode('.', $old_image_name);
    $extension = end($explode_image);
    if ($extension === 'png' ||  $extension === 'jpg') {
        if ($image['size'] <= '1000000') {
            $new_image_name = $id_auth . '_' . time() . '.' . $extension;
            $tmp_location = $image['tmp_name'];
            $file_location = "./upload/showcase/" . $new_image_name;
            move_uploaded_file($tmp_location, $file_location);
            $showcase_update_query = "UPDATE showcases SET showcase_title='$title', showcase_heading='$heading', showcase_description='$description',showcase_image='$new_image_name', showcase_status='$status' WHERE id=$id";
            $showcase_db = mysqli_query($db_connect, $showcase_update_query);
            header('location:./showcase_list.php');
        } else {
            header("location:./showcase_edit.php?id={$id}");
            $_SESSION['size_error'] = 'Your image size must be under 1MB';
        }
    } else {
        header("location:./showcase_edit.php?id={$id}");
        $_SESSION['ext_error'] = 'Your Image must be jpg or png format';
    }
    $showcase_update_query = "UPDATE showcases SET showcase_title='$title', showcase_heading='$heading', showcase_description='$description', showcase_status='$status' WHERE id=$id";
    $showcase_db = mysqli_query($db_connect, $showcase_update_query);
    header("location:./showcase_edit.php?id={$id}");

} else {
    header("location:./showcase_edit.php?id={$id}");
    $_SESSION['image_error'] = 'You cant change anything';
}


