<?php
require_once('../db_connect.php');
session_start();
$id = $_POST['id'];
$facts_update_title = htmlspecialchars(trim($_POST['facts_icon']));
$facts_update_icon = htmlspecialchars(trim($_POST['facts_count']));
$facts_update_description = htmlspecialchars(trim($_POST['facts_title']));



$facts_update_query = "UPDATE facts SET fact_icon='$facts_update_title', fact_count='$facts_update_icon', fact_title='$facts_update_description' WHERE id = '$id'";
$facts_update_db = mysqli_query($db_connect, $facts_update_query);
header('location:./facts_list.php');


?>