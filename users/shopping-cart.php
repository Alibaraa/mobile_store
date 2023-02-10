<?php 
session_start();
if($_SESSION['is-user']!=1){
    header("Location:../log-in.php");
    
}


include '../include/conn.php' ;


   
   
    
    
  
    //$_SESSION['my-userid'] = $_GET['id'];
    
    $myid =  $_SESSION['user-id'];
    $sql6 ="select * from user where id='$myid' ";
    $result3= mysqli_query($connection,$sql6);
    
    while($res = mysqli_fetch_assoc($result3)){
      $uimage=$res['image'];
      
     
      
     
    
    }
       
   
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping-Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg bg-light" dir="rtl">
        <div class="container-fluid">
        <div style="width: 20px;"></div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>  </button>
           <a href="profile.php"> <div> <img src="../img/<?php echo $uimage ?>" alt="" height="35px" width="35px"></div> </a>

            <div style="width: 20px;"></div>
             
          <a href="shopping-cart.php"><img src="../img/bag.png" alt="" height="35px" width="35px" ></a>  
         
            
          
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             
              
             <a href="index.php" style="text-decoration: none;color:black">الرئيسية</a> 
           
              
            </ul>
            <!--
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="اسم الجهاز" aria-label="Search">
              <button class="btn btn-outline-warning" type="submit">البحث</button>
            </form> -->
          </div>
        </div>
      </nav>
      

<section class="h-100" style="background-color: #eee;" dir="rtl">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">سلة التسوق</h3>
          
        </div>
        <img src="../img/<?php echo $itimg ?>" alt="" heigh="100px" width="100px">
    
        <?php

     


$sql4 ="select * from item_user where user_id='$myid' ";

$result= mysqli_query($connection,$sql4);
if($result){
  $numofrows = mysqli_num_rows($result);
     $countPrice=0;
  while($res = mysqli_fetch_assoc($result)){
   
      $id = $res['id'];
      $uid=$res['user_id'];
      $uitem=$res['item_id'];
      $sql5 ="select * from items where id='$uitem' ";
$result2= mysqli_query($connection,$sql5);

while($res = mysqli_fetch_assoc($result2)){
  $itname=$res['name'];
  $itimg=$res['image'];
  $itprice=$res['price'];
  $countPrice+=$itprice;
  
 
  
 

}


  
      echo '<div class="card rounded-3 mb-4">
      <div class="card-body p-4">
        <div class="row d-flex justify-content-between align-items-center">
          <div class="col-md-2 col-lg-2 col-xl-2">'?>
          <img src="../img/<?php echo $itimg;?>"  alt="" heigh="80px" width="80px">
          <?php echo '
          </div>
          <div class="col-md-3 col-lg-3 col-xl-3">
            <p class="lead fw-normal mb-2">'.$itname.'</p>
          </div>
          <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
            <button class="btn btn-link px-2"
              onclick="this.parentNode.querySelector("input[type=number]").stepDown()">
              <i class="fas fa-minus"></i>
            </button>

            <div class="col-md-4 col-lg-4 col-xl-4" style="font-size: 18px;">
            $'.$itprice.'
          </div>

          <a type="button" href="delete-item.php?id='.  $id . '" class="btn btn-danger"  style="margin-right:50px" ">حذف</a>

            <button class="btn btn-link px-2"
              onclick="this.parentNode.querySelector("input[type=number]").stepUp()">
              <i class="fas fa-plus"></i>
            </button>
          </div>
          <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
            <h5 class="mb-0">

            </h5>
          </div>
          <div class="col-md-1 col-lg-1 col-xl-1 text-end">
            <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
          </div>
        </div>
      </div>
    </div>';
      

    }
    
    if($numofrows>0){
      echo' <div style="display: inline;">عدد الطلبات : '.$numofrows.'</div>';
    }
    if($countPrice>0){
    echo' <div style="display: inline;margin-right:250px">مجموع الحساب : '.$countPrice.'$</div>';
    }
    if($numofrows>0){
      echo '  <a  href="delete-all-item.php" style="display: inline;margin-right:250px" ><button class="btn btn-danger" >حذف جميع الطلبات</button></a>';
    }


    if($numofrows>0){
      echo' <center>  
      <form action="" method="POST">

      <input type="submit" value="تأكيد عملية الشراء" class="btn btn-warning btn-block btn-lg" name="add_shop">

     </form>  
    </center> ';
    }
  

}
                                

?>
        

       
        

          
          
      
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>



<?php
 if(isset($_POST['add_shop'])){

  $sql1 ="select * from item_user where user_id='$myid' ";
$result= mysqli_query($connection,$sql1);
if($result){
    while($res = mysqli_fetch_assoc($result)){
      $uid=$res['user_id'];
      $uitem=$res['item_id'];
      $sql2 = "insert into shop_cart(user_id,item_id) VALUES ('$uid', '$uitem')";
      $result2 = mysqli_query($connection ,$sql2);

    }

 
 
}
$sql2 ="delete  from item_user where user_id='$myid' ";
$result2= mysqli_query($connection,$sql2);


echo '<script>window.location.href="shopping-cart.php"</script>';

}
?>

