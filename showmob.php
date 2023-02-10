<?php include 'include/conn.php' ;
session_start();

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
  width: 60%;
  height: 250px;
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
.col-lg-12 {
  float: right;
}
.timg{
  height: 300px;
}

</style>

</head>
<body>
    

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg bg-light" dir="rtl">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">متجر الاجهزة الذكية</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">الرئيسة</a>
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  انواع الاجهزة
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="sony.php">سوني</a></li>
                  <li><a class="dropdown-item" href="samsung.php">سامسونج</a></li>
                  <li><a class="dropdown-item" href="hawaui.php">هواوي</a></li>
                  
            
                </ul>
              </li>            
            </ul>
            
          </div>
        </div>
      </nav>
      
      <!--end of navbar-->
    

      <div class="container">
        <div class="row">
        <?php  

          $myid =$_GET['id'];
             $query = "select * from items where id='$myid'";
             $result = mysqli_query($connection,$query);

             while($row = mysqli_fetch_assoc($result)){

                echo '
                <center> 
                 <div class="col-lg-12 col-sm-12">
                <div class="thumbnil">
                <br>
                <center><b>'.$row['name'].'</b></center>
                <br>
              <center>   <img class="timg" src="img/'.$row['image'].'" alt=""></center>
                <hr>
                <div style="background-color: #212529; color:#ffffff;font-size: 24px;">
                <center>
                  <p> '.$row['details'].' :وصف المنتج </p>
                  <p>'.$row['category'].'  :الفئة </p>
                  <p>$'.$row['price'].'  :السعر </p>
                  
                            
                </center>
                
                 
              </div>
                <center>
                  
                </center>
              </div>
            </div>
            <center>
               ';

             }
 
      ?>

         
        
    

        </div>

      </div>
      <br>
      <br>

     

      

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>