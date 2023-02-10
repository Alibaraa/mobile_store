<?php
session_start();
if($_SESSION['is_admin']!=1){
  header("Location:index.php");
}
include '../include/conn.php';



$sql ="delete from shop_cart ";

$result = mysqli_query($connection,$sql);
if($result){
    header('Location:shop-cart.php');
}
