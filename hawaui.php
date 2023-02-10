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
.col-lg-6 {
  float: right;
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
             $query = "select * from items where category='hawaui'";
             $result = mysqli_query($connection,$query);

             while($row = mysqli_fetch_assoc($result)){

                echo '  <div class="col-lg-4 col-sm-12">
                <div class="thumbnil">
                <br>
                <center><b>'.$row['name'].'</b></center>
                <br>
              <center>   <img src="img/'.$row['image'].'" alt=""></center>
                <hr>
                <center>
                <a href="showmob.php?id='.$row['id'].'">  <button type="button" class="btn btn-warning">مواصفات الجهاز</button> </a>
                </center>
              </div>
            </div>
               ';

             }
 
      ?>

          
        
    

        </div>

      </div>
      <br>
      <br>
      <footer class="footer" style="height: 280px;">
        <!-- the form-->
        <div class="col-lg-6 col-sm-6">
          <br>
        <div dir="rtl" style="color: #ffffff; margin-right: 30px">
         <p>العنوان:</p>
         <p>غزة-خانيونس-البلد-مقابل صيدلية طيبة</p>
        </div>
        
        <div dir="rtl" style="color: #ffffff; margin-right: 30px">
         <p>رقم الموبايل:</p>
         <p>0597468523</p>
        </div>
  
        <div dir="rtl" style="color: #ffffff; margin-right: 30px">
         <p>حسابات التواصل</p>
         <img src="img/Facebook-logo.png" alt="" height="40px" width="50px">
         <img src="img/Twitter-logo.png" alt="" height="40px" width="50px" style="margin-right: 10px;">
         <img src="img/Instagram-Logo.png" alt="" height="40px" width="60px" style="margin-right: 10px;">
         

        </div>
  


              
        </div>
        <br>
        
       
        <!--The map-->
        <div class="col-lg-6 col-sm-6">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d513.9064121219209!2d34.30297518758816!3d31.343199956077193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd91ec40d6c939%3A0xb44c6a798c89ca63!2z2LfZitio2Kkg2YXZiNio2KfZitmE!5e0!3m2!1sar!2s!4v1671737795752!5m2!1sar!2s"  style="border:0; width: 80%;height: 250px;margin-left: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        

      </footer>



      

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>