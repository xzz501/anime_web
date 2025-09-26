<?php
// بدء الجلسة
session_start();
// التحقق من تسجيل الدخول
if (isset($_SESSION['loggedin'])){
  header("Location: what's.php");
}
// استقبال رقم الخطا
$rr=null;
$n=0;
if (isset($_SESSION['value']) and isset($_SESSION['n'])) { 
    $rr= $_SESSION['value'];
    $n=$_SESSION['n'];
} 
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap.min.css" rel="stylesheet">
<script src="bootstrap.bundle.min.js"></script>
    <title>تسجيل مستخدم جديد</title>
</head>
<body>
<div class="container ">
  <!-- فريم تسجيل الدخول -->
<form action="_con.php" method="post">
 
  <div class="border border-3 container mt-5 p-4" style="height: 700px;width:500px;">
    
    
  
  <div class="d-flex flex-column justify-content-center shadow-lg p-4 mb-4 bg-black" h>
    <div class="input-group justify-content-center" style="justify-items: center">
      
    <img src="logo.jpg" alt="Avatar Logo" style="width:50px;" class="rounded-pill">
    </div>
    <h2 style="text-align: center" class="pb-5">تسجيل مستخدم جديد</h2>
  
  <div class="input-group">
    
    <input type="text" class="form-control mb-3" placeholder="اسم ابمستخدم "name="name" require>
    <span style="color:red;font-size:9px;" class="input-group">
      <!-- معرفة غلط الادخال -->
    <?php 
        
        if($rr and $n==1){
            echo $rr;
            session_destroy();
        }
     ?>
     </span>
  </div>

  <div class="input-group">
    <input type="email" class="form-control mb-3" placeholder="الحساب " name="email" require>
    <span style="color:red;font-size:9px;" class="input-group">
    <?php 
        
        if($rr and $n==2){
            echo $rr;
            session_destroy();
        }
     ?>
     </span>
  </div>
  <div class="input-group">
  <input type="password" class="form-control mb-3" placeholder="كلمة المرور" name="pass" require>
  <span style="color:red;font-size:9px;" class="input-group">
    <?php 
        
        if($rr and $n==3){
            echo $rr;
            session_destroy();
        }
     ?>
     </span>
</div>
<div class="input-group">
  <input type="password" class="form-control mb-3" placeholder="تاكيد كلمة المرور" name="pass1" require>
  <span style="color:red;font-size:9px;" class="input-group">
    <?php 
        
        if($rr and $n==4){
            echo $rr;
            session_destroy();
        }
     ?>
     </span>
</div>
<div class="input-group">
  <input type="" class="form-control mb-3" placeholder="رقم الهاتف" name="phon" require>
  <span style="color:red;font-size:9px;" class="input-group">
    <?php 
        
        if($rr and $n==5){
            echo $rr;
            session_destroy();
        }
     ?>
     </span>
</div>
<div class="input-group">
  <input type="date" class="form-control mb-3" placeholder="2020/3/2" name="data" require>
</div>

<div class="input-group justify-content-center">
  
<button type="submit" class="btn btn-outline-success">تسجيل</button>
</div>
  </div>
  </div>
</form>
</div>
</body>
</html>
