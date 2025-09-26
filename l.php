<?php
session_start();
// if (!$_SESSION['loggedin']){
//   header("Location:index.php");
// }
$con=mysqli_connect('localhost','root','','animes');
if(mysqli_connect_error())
 echo "error";
 if (!empty($_GET['search'])) {
   $sea=$_GET['search'];
   # code...
 }
 else {
   $_SESSION['sear']="ادخل فيمة";
   header("Location:what's.php");
 }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link href="bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="anim.css">
  <link rel="stylesheet" href="mod.css">
<script src="bootstrap.bundle.min.js"></script>
  <script src="jquery-3.6.0.min.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="position: sticky;top:0;z-index: 1000">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="logo.jpg" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
    </a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
   <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse" id="collapsibleNavbar">
   <ul class="navbar-nav me-auto ">
     <li class="nav-item me-3">
       <a class="nav-link" href="#">اخبار</a>
     </li>
     <li class="nav-item me-3">
       <a class="nav-link" href="#">افلام</a>
     </li>
     <li class="nav-item me-3">
       <a class="nav-link" href="#">مانجا</a>
     </li>
     <li class="nav-item dropdown me-3">
       <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">الاعدادات</a>
       <ul class="dropdown-menu">
         <li><a class="dropdown-item" href="logo.php">تسجيل الخروج</a></li>
         <li><a class="dropdown-item" href="#">ااعدادات الحساب</a></li>
         <li><a class="dropdown-item" href="#">حول</a></li>
       </ul>
     </li>
   </ul>
   <!-- <form class="d-flex" style="">
  <input class="form-control me-3" type="text" placeholder="بحث">
  <button class="btn btn-primary" type="button">بحت</button>
</form> -->
 </div>
  </div>
</nav>
  <div class="popl ">
    <div class="all">
       <h1 >نتائج البحث</h1>
    </div>
    <div style="width: 100%; margin: 10px">
      <hr>
    </div>
    <div class="popl_img">
      <?php
      $r=mysqli_query($con,"SELECT * FROM anime WHERE name LIKE '%$sea%' ");
      while($rr= mysqli_fetch_array($r)) {
        $img=$rr['imge'];
        $na=$rr['name'];
        $e=$rr['whtch'];
          $l=$rr['type'];
        echo "<div class='inhet' > 
        
     
      <div class='imge'>
        <div class='cent'>
        <img src='$img' class='cs'>
        <div class='shadow1' style='height:5%'><p>viwer $e</p></div>
        <div class='shadow'><p>$na</p></div>
        <div class='shadow2' ><p>$l </p></div>
        </div>
         <h4>$na</h4>
      </div>
     
    
      
      </div>
      ";
      }
      ?>
       <!-- <div class="inhet">
      
      
         <div class="imge">
           <div class="cent">
             <img src="one1.jpg" alt="">
             <div class="shadow"></div>
           </div>
           <h4>ون بيس</h4>
         </div>
      
      
      
       </div>
       <div class="inhet">
      
      
         <div class="imge">
           <div class="cent">
             <img src="one1.jpg" alt="">
             <div class="shadow"></div>
           </div>
           <h4>ون بيس</h4>
         </div>
      
      
      
       </div>
        <div class="inhet">
       
       
          <div class="imge">
            <div class="cent">
              <img src="one1.jpg" alt="">
              <div class="shadow"></div>
            </div>
            <h4>ون بيس</h4>
          </div>
       
       
       
        </div>
         <div class="inhet">
        
        
           <div class="imge">
             <div class="cent">
               <img src="one1.jpg" alt="">
               <div class="shadow"></div>
             </div>
             <h4>ون بيس</h4>
           </div>
        
        
        
         </div>
    -->
  <!-- </div>
  </div> -->
    </div>
    </div>
  
<script>
  $(document).ready(function(){
     
      $('#p1').click(function(){
        $(this).css('background-color','blue');
          $('#p2').css('background-color','black');
          $('#sl2').hide(200);
          $('#p3').css('background-color','black');
          $('#sl3').hide(200);
        
        $('#sl1').show(250);
      });
      $('#p2').click(function(){
        $(this).css('background-color','blue');
        $('.sl #p1').css('background-color','black');
        $('#sl1').hide(200);
        
        $('#p3').css('background-color','black');
        $('#sl3').hide(200);
        $('#sl2').show(250);
        $('#sl2').css('display','flex')
      });
      $('#p3').click(function(){
        $(this).css('background-color','blue');
        $('.sl #p1').css('background-color','black');
        $('#sl1').hide(200);
        
        $('#p2').css('background-color','black');
        $('#sl2').hide(200);
        $('#sl3').show(250);
        $('#sl3').css('display','flex')
      });
      $('.cs').hover(function(){
       $(this).animate({opacity: '0.5',width:'110%'},500);
    },
     function(){
      $(this).animate({opacity: '1.0',width:'100%'},500);
});
   $('#ces').click(function(){
  window.location.href="index.html";
});
$('#app').click(function(){
  window.location.href="indexx.html";
});
   
    
    
  });  

  // function mor()
  // {
    // const d=document.getElementById('h2');
    // d.scrollIntoView({
      // behavior:'smooth'
    // })
  // }

  // function mort()
  // {
    // const d=document.getElementById('h1');
    // d.scrollIntoView({
      // behavior:'smooth'
    // })
  // }

  // 
  // function morta()
  // {
    // const d=document.getElementById('h3');
    // d.scrollIntoView({
      // behavior:'smooth'
    // })
  // }

  // function mzed()
  // {
    // window.location.href = 'mzed.html';
  // }
  // function alkl()
  // {
    // window.location.href = 'alkl.html';
  // }

  // document.getElementById('mydiv2').addEventListener('click',function(){
    // window.location.href = 'mzed.html';
  // })

  // document.getElementById('mydiv3').addEventListener('click',function(){
    // window.location.href = 'div3.html';
  // })

  // document.getElementById('mydiv4').addEventListener('click',function(){
    // window.location.href = 'div4.html';
  // })

  
</script>

</body>

</html>