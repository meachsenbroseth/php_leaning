<?php
if(isset($_POST['btnSubmit'])){
    if(!is_dir("img/")){
        mkdir('img/',0777);
    }
    
    $file = $_FILES['file']['name'];
    $tmp_file = $_FILES['file']['tmp_name'];
    
    $path = "img/" . $file;

    $move_file = move_uploaded_file($tmp_file,$path);
    if($move_file){
        header("location: postfile.php");
    }
}