<?php
if(isset($_POST['btnSubmit'])){
    require 'connection.php';
    if(!is_dir('image')){
        mkdir('image',0777);
    }
    $pname =$_POST['pname'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $total = $qty * $price;
    $img = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];

    $path = 'image/'.$img;
    move_uploaded_file($tmp_name,$path);

    $qurey= "INSERT INTO tbl_products (pname, qty, price, total, img)
                VALUES ('$pname', '$qty', '$price', '$total', '$img')";
    $insert = mysqli_query($conn,$qurey);

    if($insert){
        header("location: form.php");
    }
}