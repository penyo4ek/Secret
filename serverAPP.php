<?php
session_start();
include("conn.php");

function san($data){
    return htmlspecialchars(trim(stripslashes($data)));
}
if($_SERVER["REQUEST_METHOD"]=="POST"){

    $gender=san($_POST['gender']);
    $date=san($_POST['date']);
    $fileName=$_FILES['image']['name'];
    $path="assets/".basename($fileName);
    move_uploaded_file($_FILES['image']['tmp_name'],$path );

    $status_id=1;
    $user_id=intval($_SESSION['id']);
    $sql="INSERT INTO `applications` (`user_id`,`gender`,`date`,`med_img`,`status_id`) VALUES (?,?,?,?,?)";
    $stmt=$mysqli->prepare($sql);
    $stmt->bind_param("isssi",$user_id,$gender,$date,$fileName,$status_id);
    if($stmt->execute()){
       header("Location: profile.php?app_id_add");
       exit();
    }
    else{
        header("Location: application.php?error=not_exec");
        exit();
    }
}
else{
    header("Location: application.php");
    exit();
}
?>