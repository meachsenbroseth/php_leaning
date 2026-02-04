<?php
$host='localhost';
$db = 'db_php_leaning';
$username= 'root';
$pass='';


try{
    $conn = mysqli_connect($host,$username,$pass,$db);
}catch(Exception $e){
    echo $e->getMessage();
}