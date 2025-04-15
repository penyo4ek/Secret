<?php
session_start();
include("conn.php");

function san($data){
    return htmlspecialchars(trim(stripslashes($data)));
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email=san($_POST['email']);
    $password=san($_POST['password']);

    $sql="SELECT * FROM `users` WHERE `email` = '$email'";
    $result=$mysqli->query($sql);
    if($result->num_rows>0){
        $row=$result->fetch_assoc();
        if (password_verify($password, $row['password'])){
            $_SESSION['id']=$row["id"];
            $_SESSION['name']=$row["name"];
            $_SESSION['surname']=$row["surname"];
            $_SESSION['patronymic']=$row["patronymic"];
            $_SESSION['email']=$row["email"];
            header("Location: profile.php");
            exit();
        }
        else{
            header("Location: index.php?error=pwd_is_incorrect");
            exit();
        }
    }
    else{
        header("Location: index.php?error=user_is_not_exist");
        exit();
    }
}
else{
    header("Location: index.php");
    exit();
}
?>