<?php

$hostname = "localhost";
$username = 'root';
$pass = '';
$database = 'mstore';
$connection = mysqli_connect($hostname,$username,$pass,$database);

if(!$connection){
    echo 'error connection';
}