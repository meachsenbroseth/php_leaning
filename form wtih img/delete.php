<?php
require 'connection.php';
if(isset($_POST['btnDelete'])){
    $id = $_POST['id'];
    $delete = mysqli_query($conn,"DELETE FROM `tbl_products` WHERE `id` = '$id'");
    if($delete){
        header("location: form.php");
    }
}