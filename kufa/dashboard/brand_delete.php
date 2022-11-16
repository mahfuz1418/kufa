<?php

require_once('../db_connect.php');
$id = $_GET['id'];
$brand_delete_query = "DELETE FROM `brands` WHERE id=$id";
$brand_delete_db = mysqli_query($db_connect, $brand_delete_query);
header('location:./brands.php?id=#list');


?>