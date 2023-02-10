<?php
session_start();
$_SESSION['is_admin']=0;
session_destroy();
header("Location:index.php");


