<?php
require_once('../db_connect.php');
session_start();


$facts_icon = htmlspecialchars(trim($_POST['facts_icon']));
$facts_count = htmlspecialchars(trim($_POST['facts_count']));
$facts_title = htmlspecialchars(trim($_POST['facts_title']));





if ($facts_icon && $facts_count && $facts_title) {
    $service_add_query = "INSERT INTO facts (fact_icon,fact_count,fact_title) VALUES ('$facts_icon','$facts_count','$facts_title')";
    mysqli_query($db_connect, $service_add_query);
    $_SESSION['facts_success'] = 'Facts data succesfully added';
    header('location:./facts_add.php');
} else {
    $flag = true;
    $_SESSION['facts_error'] = 'All field required';
    header('location:./facts_add.php');
}


?>