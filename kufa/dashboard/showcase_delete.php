<?php
    require_once('../db_connect.php');
    $id = $_GET['id'];
    $showcase_delete_query = "DELETE FROM `showcases` WHERE id=$id";
    $showcase_delete_db = mysqli_query($db_connect, $showcase_delete_query);
    header('location:./showcase_list.php');



?>