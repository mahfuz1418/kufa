<?php
require_once('../db_connect.php');
session_start();
$id = $_SESSION['auth_id'];
$facebook = htmlspecialchars(trim($_POST['facebook_link']));
$twitter = htmlspecialchars(trim($_POST['twitter_link']));
$instagram = htmlspecialchars(trim($_POST['instagram_link']));
$linkedin = htmlspecialchars(trim($_POST['linkedin_link']));

if ($facebook && $twitter && $instagram && $linkedin) {
    $social_update_query = "UPDATE admins SET facebook='$facebook', twitter='$twitter',instagram='$instagram',linkedin='$linkedin' WHERE id = '$id'";
    $social_update_db = mysqli_query($db_connect, $social_update_query);
    header('location:./social.php');
    $_SESSION['link_success'] = 'Your Social Linkes Updated Successfully !';
} else {
    header('location:./social.php');
    $_SESSION['link_error'] = 'You must be input Your links !';
}
