<?php
require_once('../db_connect.php');
session_start();
$id = $_POST['id'];
$about_me_update = $_POST['about_me'];
$about_update_icon = $_POST['skill_icon'];
$about_update_title = $_POST['skill_title'];
$about_update_persent = $_POST['skill_percent'];



$about_update_query = "UPDATE `abouts` SET `about_me`='$about_me_update',`skill_icon`='$about_update_icon',`skill_title`='$about_update_title',`skill_percent`='$about_update_persent' WHERE id=$id";
$about_update_db = mysqli_query($db_connect, $about_update_query);
header('location:./about_list.php');


?>