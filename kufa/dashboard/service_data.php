<?php
require_once('../db_connect.php');
session_start();

$service_title = htmlspecialchars(trim($_POST['service_title']));
$service_icon = htmlspecialchars(trim($_POST['service_icon']));
$service_description = htmlspecialchars(trim($_POST['service_description']));
$service_status = $_POST['service_status'];



if ($service_title && $service_icon && $service_description) {
    $service_add_query = "INSERT INTO services (service_title,service_icon,service_description,service_status) VALUES ('$service_title','$service_icon','$service_description', '$service_status')";
    mysqli_query($db_connect, $service_add_query);
    $_SESSION['success'] = 'Service data succesfully added';
    header('location: ./service_add.php');
} else {
    $flag = true;
    $_SESSION['service_error'] = 'All field required';
    header('location:./service_add.php');
}


