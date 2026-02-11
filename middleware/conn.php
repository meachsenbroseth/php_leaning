<?php
try{
$conn = mysqli_connect('localhost','root','','db_php_leaning');
}catch(Exception $e){
    echo $e->getMessage();
}