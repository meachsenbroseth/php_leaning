<?php
require 'connection.php';

if (!is_dir('img')) {
    mkdir('img', 0777);
}
$username = $_POST['username'];
$gender = $_POST['gender'];
$flie = $_FILES['file']['name'];
$tmp_name = $_FILES['file']['tmp_name'];

$path = 'img/' . $flie;

move_uploaded_file($tmp_name, $path);

$query = "INSERT INTO `tbl_students`(`name`, `gender`, `profile`) VALUES ('$username','$gender','$path')";
$insert = mysqli_query($conn, $query);

$select_id = mysqli_query(
    $conn,
    "SELECT id FROM tbl_students ORDER BY id DESC LIMIT 1"
);

$ex = mysqli_fetch_assoc($select_id);

echo $ex['id'];
