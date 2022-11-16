<?php
    require_once('../db_connect.php');
    $id = $_GET['id'];
    $testimonial_delete_query = "DELETE FROM testimonials WHERE id=$id";
    $testimonial_delete_db = mysqli_query($db_connect, $testimonial_delete_query);
    header('location:./testimonial_list.php');



?>