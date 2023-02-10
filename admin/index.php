<?php include '../include/conn.php' ;
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
       
      </nav>
      
      <!--end of navbar-->
   

      <div class="container">
        <div class="row">
         
        <div class="col-lg-12 col-sm-12">
          <br>
          <form dir="rtl" style="margin-right: 10px;" method="POST">
            <div class="form-group" >
              <label for="exampleInputEmail1" class="black">اسم المستخدم</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="اسم المستخدم" name="username">
         <!--     <small id="emailHelp" class="form-text text-muted">لن نشارك المعلومات مع احد</small>
            --></div>
            <div class="form-group">
              <label for="exampleInputPassword1" class="black">كلمة المرور</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور" name="password">
            </div>
            <br>
            <input type="submit" class="btn btn-primary" value="تسجيل الدخول" name="log-in">
          </form>

        </div>
    

        </div>

      </div>

      <?php
        if(isset($_POST['log-in'])){
          include '../include/conn.php';
          $name = $_POST['username'];
          $pass = $_POST['password'];

          $sql = "select * from admins where name='$name' and password='$pass'";
             
          $result = mysqli_query($connection,$sql);
              while($res=mysqli_fetch_assoc($result)){
                $_SESSION['is_admin']=1;
                  echo "<script>window.location.href='admin-index.php'</script>";
              }
                  echo "<br>";
              echo '<p dir="rtl" style="color: red;margin-right:130px">كلمة المرور او اسم المستخدم خطأ</p>';


        }


        ?>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>