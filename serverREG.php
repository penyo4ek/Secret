<?php
session_start();
include("conn.php");

function san($data){
    return htmlspecialchars(trim(stripslashes($data)));
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $name=san($_POST['name']);
    $surname=san($_POST['surname']);
    $patronymic=san($_POST['patronymic']);
    $date=san($_POST['date']);
    $phone=san($_POST['phone']);
    $email=san($_POST['email']);
    $password=san($_POST['password']);
    if (empty($surname)|| empty($name)|| empty($patronymic)|| empty($date)|| empty($phone)|| empty($email)|| empty($password)){
        header("Location: reg.php?error=empty_fields");
        exit();
    }
    $sql="SELECT * FROM `users` WHERE `email` = '$email'";
    $result=$mysqli->query($sql);
    if ($result->num_rows>0){
        header("Location: reg.php?error=user_exist");
        exit();
    }

    $h_password=password_hash($password, PASSWORD_DEFAULT);
    $sql="INSERT INTO `users` (`surname`,`name`,`patronymic`,`bdate`,`phone`,`email`,`password`) VALUES (?,?,?,?,?,?,?)";
    $stmt=$mysqli->prepare($sql);
    $stmt->bind_param("sssssss",$surname,$name,$patronymic,$date,$phone,$email,$h_password);
    if($stmt->execute()){
        $_SESSION['id']=$mysqli->insert_id;
       $_SESSION['name']=$name;
       $_SESSION['surname']=$surname;
       $_SESSION['patronymic']=$patronymic;
       $_SESSION['email']=$email;
       header("Location: profile.php");
       exit();
    }
    else{
        header("Location: reg.php?error=not_exec");
        exit();
    }
}
else{
    header("Location: reg.php");
    exit();
}
?>