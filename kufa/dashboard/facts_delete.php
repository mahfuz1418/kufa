<?php

require_once('../db_connect.php');
$id = $_GET['id'];
$facts_delete_query = "DELETE FROM `facts` WHERE id=$id";
$facts_delete_db = mysqli_query($db_connect, $facts_delete_query);
header('location:./facts_list.php');






?>