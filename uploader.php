<?php
require 'config.php';
session_start();
if(isset($_POST['upload'])){
    $type = $_POST['type'];
    $studentid = $_POST['studentid'];
    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

  //move the file to the UPLOADS folder
    move_uploaded_file($file_tmp,"UPLOADS/".$file);
    
    //get the link of uploadfiles
    $link = "UPLOADS/".$file;


    //insert the link to the database
    $sql = "INSERT INTO studentrequirments(USERID,TYPE,LINK) VALUES('$studentid','$type','$link')";
    $result = mysqli_query($con,$sql);
    if($result){
        $_SESSION['success'] = "true";
        header("Location: requirement-viewing.php");
    }
    else{
        $_SESSION['success'] = "false";
        header("Location: requirement-viewing.php");
    }

}
?>