<?php
session_start();

$username =htmlspecialchars($_POST['userName']);
$role=htmlspecialchars($_POST['role']);

$_SESSION['userName']=$username;
$_SESSION['role']=$role;

if($_SESSION['role']=='admin'){
    header('location:dashborad.php');
}else{
    header('location:user.php');
}
?>