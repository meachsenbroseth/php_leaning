<?php
require "connection.php";

$id = $_POST['id'];

mysqli_query($conn,"DELETE FROM `tbl_students` WHERE `id`='$id'");