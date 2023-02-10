<?php
session_start();
if($_SESSION['is_admin']!=1){
  header("Location:index.php");
}
include '../include/conn.php';
$id =(int)$_GET['id'];
$sql ="select * from items where id='$id'";
$result= mysqli_query($connection,$sql);

if($result){
    while($res = mysqli_fetch_assoc($result)){
       $mname=$res['name'];
       $mprice=$res['price'];
       $mdetails=$res['details'];
       $mimage=$res['image'];
       $mcategory=$res['category'];

    }
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
                <a class="nav-link active" aria-current="page" href="admin-index.php">الرئيسية</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="logout.php">تسجيل الخروج</a>
              </li>
              
               
          
          </div>
        </div>
      </nav>
      <!--end of navbar-->

      <div class="container">
        <div class="row">
          <form dir="rtl" style="margin-right: 10px;" method="POST" action="" enctype="multipart/form-data">
            <div class="form-group" >
              <label for="exampleInputEmail1" class="black"> اسم المنتج</label>
              <input name="mname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $mname;  ?>">
         <!--     <small id="emailHelp" class="form-text text-muted">لن نشارك المعلومات مع احد</small>
            --></div>
            <div class="form-group">
              <label for="exampleInputPassword1" class="black">السعر</label>
              <input name="mprice" type="text" class="form-control" id="exampleInputPassword1"  value="<?php echo $mprice;  ?>">
            </div>
              
            <div class="form-group">
              <label for="exampleInputPassword1" class="black">الفئة:  </label>
              
              <select name="category" id="">
                <option  value="<?php echo $mcategory;  ?>"><?php echo $mcategory;  ?></option>
                <option value="samsung">Samsung</option>
                <option value="sony">Sony</option>
                <option value="hawaui">Hawaui</option>
                            
              </select>
            </div>


            <div class="form-group">
              <label for="exampleInputPassword1" class="black">التفاصيل</label>
              <textarea name="mdetails" type="text" class="form-control" id="exampleInputPassword1"  ><?php echo $mdetails;  ?></textarea>
            </div>
            <br>
            <div class="form-group">
              <label for="exampleInputPassword1" class="black">الصورة الحالية</label>
             <center> <img src="../img/<?php echo $mimage?>" alt=""> </center>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1" class="black">تعديل الصورة</label>
              <input name="file" type="file" class="form-control" id="exampleInputPassword1">
            </div>
            <br>
            <input type="submit" class="btn btn-primary" value="تعديل" name="update_data">
          </form>
          
          <?php
if(isset($_POST['update_data'])){
  include 'include/conn.php';
    $name = $_POST['mname'];
    $details = $_POST['mdetails'];
    $price = $_POST['mprice'];
    $cate = $_POST['category'];
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



    if($name === ""||$details ==="" ||$price ===""||$cate==""){
        
        echo '<p dir="rtl" style="color: red;">جميع القيم مطلوبة</p>';

    
      
   
    }

   

    else{

      if($fileName==""){
        $sql = "update items set name='$name',price='$price',details='$details',category='$cate',image='$mimage' where id='$id'";
        $result = mysqli_query($connection ,$sql);
        if($result){
          echo '<p>تمت عملية الاضافة بنجاح</p>';
          echo '<script>window.location.href="edit.php?id='.$id.'"</script>';
        }
        
   
       
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
                      $fileDestination = '../img/'.$fileNameNew;
                      move_uploaded_file($fileTmpName,$fileDestination);
                     // aba: for upload into database
                  
                   
                     
                       $sql = "update items set name='$name',price='$price',details='$details',category='$cate',image='$fileNameNew' where id='$id'";
                       $result = mysqli_query($connection ,$sql);
                    
                   
                      if(!$result){
                        echo 'error';

                      }
                      else{
                        echo "<br>";
                        echo '<script>window.location.href="edit.php?id='.$id.'"</script>';
                        echo '<p dir="rtl">تم التعديل بنجاح</p>';
                      }

                }
            else{
                echo 'حجم الملف كبير جدا';
                        }
    }
    else{
        echo 'حدث خطأ أثناء تحميل الملف';
    }

}else{
echo 'لا يمكن تحميل هذا النوع من الملفات';
}
      }
        
       // $query = "INSERT into users(firstname,lastname,age) values('$f_name','$l_name','$age') ";
      
     
         


    }

  
    


   }?>

        </div>

      </div>
      <br>
      <br>



      

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

