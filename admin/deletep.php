<?php
session_start();
if($_SESSION['is_admin']!=1){
  header("Location:index.php");
}
include '../include/conn.php';

$id =(int)$_GET['id'];

$sql ="delete from items where id = '$id' ";

$result = mysqli_query($connection,$sql);
if($result){
    header('Location:items.php');
}
