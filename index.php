<?php
// بدء الجلسة
session_start();
// التحقق من تسجيل الدخول
if (isset($_SESSION['loggedin'])){ 
  //التحويل الى صفحة الرئسية
  header("Location: what's.php");
}
//التحقق من ان المستخدم يمتلك جلسة 
if (isset($_COOKIE['username']) && !isset($_SESSION['loggedin'])) {
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['loggedin'] = true;
    header("Location: what's.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap.min.css" rel="stylesheet">
<script src="bootstrap.bundle.min.js"></script>
    <title></title>
</head>
<body>
<div class="container ">
  <!-- الفورم ارسال البيانات -->
<form action="pho.php" method="post">
 
  <div class="border border-3 container mt-5 p-5" style="height: 600px;width:500px;">
    
    
  
  <div class="d-flex flex-column justify-content-center shadow-lg p-3 mb-3 bg-black" >
    <div class="input-group justify-content-center" style="justify-items: center">
      
    <img src="logo.jpg" alt="Avatar Logo" style="width:50px;" class="rounded-pill">
    </div>
    <h2 style="text-align: center" class="pb-5">تسجيل دخول </h2>
  
  <div class="input-group">
    
    <input type="text" class="form-control mb-3" placeholder="اسم ابمستخدم "name="name" >
  </div>

  <div class="input-group">
    <input type="email" class="form-control mb-3" placeholder="الحساب " name="email">
  </div>
  <div class="input-group">
  <input type="password" class="form-control mb-3" placeholder="كلمة المرور" name="pass">
</div>
<div class="input-grop">
  
  <input type="checkbox" name="rem" id="f">
  <label for="rem">حفظ تسجيل الدخول</label>
</div>
<div class="input-group justify-content-center">
  
<button type="submit" class="btn btn-outline-success">دخول</button>
</div>
<div class="input-group justify-content-center">
  
 <a href="passcon.php" style="text-decoration: none;text-align: center;width: 88px;" class="badge rounded-pill bg-primary mt-3"> نسيت كلمة المرور</a>
</div>
<div class="input-group justify-content-center">
  <!-- التحويل الى صفحة تسجيل حساب جديد -->

  <a href="singin.php" style="text-decoration: none;text-align: center;width: 100px;" class="badge rounded-pill bg-info mt-3"> تسجيل حساب جديد</a>
</div>
  </div>
  </div>
</form>
</div>
</body>
</html>
