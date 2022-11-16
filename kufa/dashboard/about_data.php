<?php
require_once('../db_connect.php');

$about = htmlspecialchars(trim($_POST['about_me']));
$skill = htmlspecialchars(trim($_POST['skil_icon']));
$title = htmlspecialchars(trim($_POST['skill_title']));
$persent = htmlspecialchars(trim($_POST['skill_persent']));





if (isset($_POST['add_skill'])){
    if ($about && $skill && $title && $persent) {
        $about_query = "INSERT INTO `abouts`(`about_me`, `skill_icon`, `skill_title`, `skill_percent`) VALUES ('$about','$skill','$title','$persent')";
        $about_db = mysqli_query($db_connect, $about_query);
        $_SESSION['about_success'] = 'About data succesfully added';
        header('location:./about_add.php');
    } else {
        $_SESSION['about_error'] = 'no';
        header('location:./about_add.php');
    
    }

}




?>