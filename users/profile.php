<?php
session_start();
include '../include/conn.php' ;
if($_SESSION['is-user']!=1){
  header("Location:../log-in.php");
  
}
$id = $_SESSION['user-id'];
$sql ="select * from user where id='$id'";
$result= mysqli_query($connection,$sql);
if($result){
    while($res = mysqli_fetch_assoc($result)){
       $uname=$res['name'];
       $uimage=$res['image'];
       $uemail=$res['email'];
       $uphone=$res['phone'];
       $uaddress=$res['address'];
       
      

    }
}

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<section style="background-color: #eee; height: 100%;" dir="rtl">
  <div class="container py-5">


    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="../img/<?php echo $uimage; ?>" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?php echo $uname; ?></h5>
            <div class="d-flex justify-content-center mb-2">
              <a href="edit-user.php"><button type="button" class="btn btn-primary">تعديل الحساب</button>
              
              <a href="edit-password.php" style="margin-right: 20px;"><button type="button" class="btn btn-primary">تغيير كلمة المرور</button>
              
              </a>
            </div>
          </div>
        </div>
       
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">الأسم</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"> <?php echo $uname; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">البريد الالكتروني</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $uemail; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">رقم الجوال</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $uphone; ?></p>
              </div>
            </div>
            <hr>
            
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">العنوان</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $uaddress; ?></p>
              </div>
            </div>
          </div>
     
          </div>
        </div>
      </div>
    </div>
  </div>
</section>