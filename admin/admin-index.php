<?php include '../include/conn.php' ;
session_start();

if($_SESSION['is_admin']!=1){
  header("Location:index.php");
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
          <a class="navbar-brand" href="#">متجر الاجهزة الذكية</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="logout.php">تسجيل الخروج</a>
              </li>
              
                        
           
            
          </div>
        </div>
      </nav>
      
      <!--end of navbar-->
   

      <div class="container">
        <div class="row">


        <div class="col-lg-4 col-sm-12">
                <div class="thumbnil">
                <br>
                <center><b>اضافة</b></center>
                <br>
              <center>   <img src="../img/create.png" alt=""></center>
                <hr>
                <center>
                  <a type="button" class="btn btn-warning" href="addmob.php">انتقل</a>
                </center>
              </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="thumbnil">
                <br>
                <center><b>تعديل</b></center>
                <br>
              <center>   <img src="../img/update.png" alt=""></center>
                <hr>
                <center>
                  <a type="button" class="btn btn-warning" href="items.php">انتقل</a>
                </center>
              </div>
            </div>



            <div class="col-lg-4 col-sm-12">
                <div class="thumbnil">
                <br>
                <center><b>المستخدمين</b></center>
                <br>
              <center>   <img src="../img/users-logo.png" alt=""></center>
                <hr>
                <center>
                  <a type="button" class="btn btn-warning" href="users.php">انتقل</a>
                </center>
              </div>
            </div>


            <div class="col-lg-4 col-sm-12">
                <div class="thumbnil">
                <br>
                <center><b>الطلبات</b></center>
                <br>
              <center>   <img src="../img/shop-cart.png" alt=""></center>
                <hr>
                <center>
                  <a type="button" class="btn btn-warning" href="shop-cart.php">انتقل</a>
                </center>
              </div>
            </div>


          
        
    

        </div>

      </div>
      <br>
      <br>

  


      

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>