<?php
require '../conn.php';

if(isset($_POST['btnRegister'])){
    $useranme= $_POST['username'];
    $email= $_POST['email'];
    $password= password_hash($_POST['password'],PASSWORD_BCRYPT);

    $register = "INSERT INTO `tbl_user`(`username`, `email`, `password`) VALUES ('$useranme','$email','$password')";
    $ex = mysqli_query($conn,$register);

    if($ex){
        header('location: login.php');
    }
}