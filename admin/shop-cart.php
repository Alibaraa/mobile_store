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
              <td>رقم الطلب</td>
              <td>اسم الزبون</td>
              <td>عنوان الزبون</td>
              <td>رقم الجوال</td>
              <td>اسم الجهاز</td>
              <td>السعر</td>
              <td>#</td>
              
            </tr>
          
              <?php  
              
               $sql = "select * from shop_cart";
               $result = mysqli_query($connection,$sql);
               
                $numofrows = mysqli_num_rows($result);
                if($numofrows>0){
                  echo '<div dir="rtl">  <a  href="delete-all-product.php" dir="rtl"><button class="btn btn-danger" dri="rtl">حذف جميع الطلبات</button></a>   </div>';
                }

                   while($res=mysqli_fetch_assoc($result)){
                    $id = $res['id'];
                    $user_id = $res['user_id'];
                    $item_id = $res['item_id'];
                    echo '<td>'.$id.'</td>';
                    $sql2 = "select * from user where id='$user_id'";
                    $result2 = mysqli_query($connection,$sql2);
                    
                   
                    while($res=mysqli_fetch_assoc($result2)){
                       $uname = $res['name'];
                       $uaddress = $res['address'];
                       $uphone = $res['phone'];
                       echo '<td>'.$uname.'</td>';
                       echo '<td>'.$uaddress.'</td>';
                       echo '<td>'.$uphone.'</td>';
                       
                    }

                    $sql3 = "select * from items where id='$item_id'";
                    $result3 = mysqli_query($connection,$sql3);
                    
                   
                    while($res=mysqli_fetch_assoc($result3)){
                       $itname = $res['name'];
                       $itprice =$res['price'];
                       echo '<td>'.$itname.'</td>';
                       echo '<td>'.$itprice.'</td>';
                       
                    }

                    

                   /* $sql3 = "select * from items where id='$item_id'";
                    $result3 = mysqli_query($connection,$sql3);
                    while($res=mysqli_fetch_assoc($result3)){
                      
                     }
                            */
                     
                    
                     ?>
                              
                    <td> <a type="button" href="delete_product.php?id=<?php echo $id ?>" class="btn btn-danger">حذف</a></td>
                    
                     <?php
                    echo  '</tr>';
                     
                     
                   }
                
             
              ?>
           
                    
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

