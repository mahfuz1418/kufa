<?php
require_once('../db_connect.php');
session_start();
$id = $_POST['id'];
$service_update_title = htmlspecialchars(trim($_POST['service_title']));
$service_update_icon = htmlspecialchars(trim($_POST['service_icon']));
$service_update_description = htmlspecialchars(trim($_POST['service_description']));
$service_update_status = $_POST['service_status'];


$service_update_query = "UPDATE services SET service_title='$service_update_title',service_icon='$service_update_icon',service_description='$service_update_description',service_status='$service_update_status' WHERE id = '$id'";
$service_update_db = mysqli_query($db_connect, $service_update_query);
header('location:./service_list.php');


?>