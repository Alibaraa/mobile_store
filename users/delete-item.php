<?php
session_start();
if($_SESSION['is-user']!=1){
    header("Location:../log-in.php");
    
}
include '../include/conn.php';

$id =(int)$_GET['id'];

$sql ="delete  from item_user where id = '$id' ";

$result = mysqli_query($connection,$sql);
if($result){
    header('Location:shopping-cart.php');
}
?>
<h1>hello</h1>