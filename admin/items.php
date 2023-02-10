<?php
session_start();
if($_SESSION['is_admin']!=1){
  header("Location:index.php");
}

include '../include/conn.php' ?>
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
                <a class="nav-link active" aria-current="page" href="admin-index.php">الرئيسة</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">تسجيل الخروج</a>
              </li>
                      
            </ul>
            
          </div>
        </div>
      </nav>
      <!--end of navbar-->
      <br><br>
           <table class="table table-striped" dir="rtl">
            <tr>
              <td>رقم المنتج</td>
              <td>الأسم</td>
              <td>السعر</td>
              <td>التفاصيل</td>
              <td>#</td>
              <td>#</td>
            
              <?php  
               $sql = "select * from items";
               $result = mysqli_query($connection,$sql);
                   while($res=mysqli_fetch_assoc($result)){
                     echo '<tr>
                     <td>'.$res['id'].'</td>
                     <td>'.$res['name'].'</td>
                     <td>'.$res['price'].'</td>
                     <td>'.$res['details'].'</td>';
                     ?>
                              
                    <td> <a type="button" href="deletep.php?id=<?php echo $res['id'] ?>" class="btn btn-danger   ">حذف</a></td>
                    <td> <a type="button" href="edit.php?id=<?php echo $res['id'] ?>" class="btn btn-success   ">تعديل</a></td>
                     <?php
                    echo  '</tr>';
                     
                     
                   }
                
             
              ?>
            </tr>
                    
           </table>



      <div class="container">
        <div class="row">
        

        </div>

      </div>
      <br>
      <br>

     


      

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

