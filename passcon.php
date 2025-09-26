<?php
session_start()

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap.bundle.min.js"></script>
  <title>Document</title>
</head>
<body>
<div class="container ">
<form action="for.php" method="post">
 
  <div class="border border-3 container mt-5 p-5" style="height: 600px;width:500px;">
    
    
  
  <div class="d-flex flex-column justify-content-center shadow-lg p-4 mb-4 bg-black" h>
    <div class="input-group justify-content-center" style="justify-items: center">
      
    <img src="logo.jpg" alt="Avatar Logo" style="width:50px;" class="rounded-pill">
    </div>
    <h2 style="text-align: center" class="pb-5">استرجاع كلمة المرور</h2>
  
  <div class="input-group">
    
    <input type="text" class="form-control mb-3" placeholder="رقم الهاتف"name="phon" >
    <span style="color:red;font-size:10px;" class="input-group">
    <?php
    if(isset($_SESSION['val'])){
      echo $_SESSION['val'];
      $_SESSION['val']=null;
    }
    ?>
    </span>
  </div>

  <div class="input-group">
    <input type="date" class="form-control mb-3" placeholder="تريخ الميلاد " name="data">
  </div>
<div class="input-group justify-content-center">
  
<button type="submit" class="btn btn-outline-success">تحقق</button>
</div>

  </div>
  </div>
</form>
</body>
</html>