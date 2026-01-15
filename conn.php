<?php $servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_employees";
try{
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
}catch(mysqli_sql_exception){
    echo 'can not connect';
}
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
