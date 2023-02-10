<?php
session_start();
if($_SESSION['is-user']!=1){
    header("Location:../log-in.php");
    
}
include '../include/conn.php';

$user_id = $_SESSION['user-id'];

$sql ="delete from item_user where user_id='$user_id'";

$result = mysqli_query($connection,$sql);
if($result){
    header('Location:shopping-cart.php');
}
?>