<?php
session_start();
include 'include/conn.php';

$email ="hello";
$name;



if(isset($_SESSION['email'])){

$email =$_SESSION['email'];
}
else{
  header('location:index.php');
}


$sql = "select * from user where email='$email'";
             
$result = mysqli_query($connection,$sql);
while($res=mysqli_fetch_assoc($result)){
  $name = $res['name'];
              }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>متجر الموبايلات</title>
    
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<style>
.navbar-expand-lg{
    background-color: #444 !important;

}


.navbar-brand{
    color: #ffffff;
}
.navbar-nav .nav-link.active, .navbar-nav .show>.nav-link{
    color: #ffffff;
}
.dropdown-toggle{
    color: #ffffff;
}
.form-control{
    margin-left: 20px;
}
body{
  background-color: #f0f0f0;
}
.col-lg-4{

  margin-top: 20px;
  height: 440px;
}
.col-lg-4 img{
  width: 80%;
  height: 320px;
}
.thumbnil{
  background-color: #ffffff;
  width: 95%;
  margin: 10px;
  height: 400px;
  border-radius: 10px;
}
.footer{
  height: 250px;
  width: 100%;
  background-color: #444;
}
label{
  color: #ffffff;
}
.col-lg-6 {
  float: right;
}
.black{
  color: #000000;
}
</style>

</head>
<body>


    

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg bg-light" dir="rtl">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">متجر الاجهزة الذكية</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">الرئيسة</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="logout.php">تسجيل الخروج</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  انواع الاجهزة
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">سوني</a></li>
                  <li><a class="dropdown-item" href="#">سامسونج</a></li>
                  <li><a class="dropdown-item" href="#">هواوي</a></li>
                  
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">جميع الاجهزة</a></li>
                </ul>
              </li>            
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="اسم الجهاز" aria-label="Search">
              <button class="btn btn-outline-warning" type="submit">البحث</button>
            </form>
          </div>
        </div>
      </nav>
      <!--end of navbar-->

      <div class="container">
        <div class="row">
          <center>Welcome   <?php
          
          
          echo $name;  ?> </center>
          <?php
if(isset($_POST['insert_data'])){
  include 'include/conn.php';
    $name = $_POST['mname'];
    $details = $_POST['mdetails'];
    $price = $_POST['mprice'];
    $file = $_FILES['file'];
    //print_r($file);
   $fileName = $_FILES['file']['name'];
   $fileTmpName = $_FILES['file']['tmp_name'];
   $fileType = $_FILES['file']['type'];
   $fileError = $_FILES['file']['error'];
   $fileSize = $_FILES['file']['size'];



   $fileExt = explode('.',$fileName);

   $fileActualExt = strtolower(end($fileExt));
   $allow = array('jpg','jpeg','png','pdf','jfif');



    if($name === ""||$details ==="" ||$price ===""||$fileName==""){
        
        echo '<p dir="rtl">جميع القيم مطلوبة</p>';
    }

    else{


      
   if(in_array($fileActualExt,$allow)){
    if($fileError ===0 ){
            if($fileSize < 1000000){
                    $fileNameNew = time().rand(1000,9999).".".$fileActualExt;
                  //  $fileNameNew = uniqid('',true).".".$fileActualExt;
                  
                  /*  $fileDestination = 'uploads/'.$fileNameNew;
                  
                    move_uploaded_file($fileTmpName,$fileDestination);
                    //header("Location:index.php? uploadsuccess");
                     echo 'success upload';
                      */
                      $fileDestination = 'img/'.$fileNameNew;
                      move_uploaded_file($fileTmpName,$fileDestination);
                     // aba: for upload into database
                     $sql = "INSERT INTO items (name,price,details,image)VALUES ('$name', '$price', '$details','$fileNameNew')";
                      $result = mysqli_query($connection ,$sql);
                      if(!$result){
                        echo 'error';

                      }
                      else{
                        echo "<br>";
                        echo '<p dir="rtl">تمت الاضافة بنجاح</p>';
                      }

                }
            else{
                echo 'your file is too big!!';
                        }
    }
    else{
        echo 'there was error in upload file';
    }

}else{
echo 'You can not upload files of this type!!!';
}

        
       // $query = "INSERT into users(firstname,lastname,age) values('$f_name','$l_name','$age') ";
      
     
         


    }

  
    


   }?>

        </div>

      </div>
      <br>
      <br>

      <footer class="footer">
        <!-- the form-->
        <div class="col-lg-6 col-sm-6">
          <br>
          <form dir="rtl" style="margin-right: 10px;">
            <div class="form-group" >
              <label for="exampleInputEmail1">البريد الالكتروني</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ادخل البريد الالكتروني">
         <!--     <small id="emailHelp" class="form-text text-muted">لن نشارك المعلومات مع احد</small>
            --></div>
            <div class="form-group">
              <label for="exampleInputPassword1">كلمة المرور</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">تسجيل الدخول</button>
          </form>

        </div>
        <br>
        
        <!--The map-->
        <div class="col-lg-6 col-sm-6">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d513.9064121219209!2d34.30297518758816!3d31.343199956077193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd91ec40d6c939%3A0xb44c6a798c89ca63!2z2LfZitio2Kkg2YXZiNio2KfZitmE!5e0!3m2!1sar!2s!4v1671737795752!5m2!1sar!2s"  style="border:0; width: 80%;height: 200px;margin-left: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        

      </footer>


      

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

