<?php
require 'connection.php';
$id = $_POST['id'];
$username = $_POST['username'];
$gender = $_POST['gender'];
if (!empty($_FILES['file']['name'])) {
    $flie = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];

    $path = 'img/' . $flie;

    move_uploaded_file($tmp_name, $path);

    $query = "UPDATE `tbl_students` SET `name`='$username',`gender`='$gender',`profile`='$path' WHERE id = '$id'";
}else{
    $query = "UPDATE `tbl_students` SET `name`='$username',`gender`='$gender' WHERE id = '$id'";
}

$update = mysqli_query($conn, $query);
