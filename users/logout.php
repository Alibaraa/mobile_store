<?php
session_start();
$_SESSION['is-user']=0;
session_destroy();
header("Location:index.php");

