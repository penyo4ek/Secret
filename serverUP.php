<?php
session_start();
include("conn.php");

function san($data){
    return htmlspecialchars(trim(stripslashes($data)));
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $status_id=san($_POST['status_id']);
    $id=intval($_GET['id']);

    $sql="UPDATE `applications` SET `status_id` = ? WHERE `id` = ?";
    $stmt=$mysqli->prepare($sql);
    $stmt->bind_param('ii', $status_id, $id);

    if($stmt->execute()){
        header("Location: all_applications.php");
        exit();
    }
    else{
        header("Location: all_applications.php?error=error");
        exit();
    }
    }
    else{
        header("Location: all_applications.php");
        exit();
    }
?>