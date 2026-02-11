<?php
require '../conn.php';
if(isset($_POST['btnLogin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = "select password, is_admin from tbl_user where email = '$email'";
    $result = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($result);

    if(password_verify($password,$row['password'])){
        // $_SESSION['is_admin']=$row['is_admin'];
        setcookie('is_admin',$row['is_admin'],time()+60,'/');
        ($row['is_admin']==1)?header('location: ../admin/dashbord.php'):header('location: ../user/user.php');
    }else{
        echo "<script>alert('khos');</script>";
    }
}