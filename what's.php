<?php
session_start();
if (!$_SESSION['loggedin']){
  header("Location:index.php");
}
$con=mysqli_connect('localhost','root','','animes');
if(mysqli_connect_error())
 echo "error";
$data=array();
$r=mysqli_query($con,"SELECT * FROM anime ");
        while($rr= mysqli_fetch_array($r)) {
          $data[$rr['id']]=$rr;
        }
$jsdata=json_encode($data,JSON_UNESCAPED_UNICODE);
file_put_contents('data.json',$jsdata);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="anim.css">
  <link rel="stylesheet" href="mod.css">
 <script src="bootstrap.bundle.min.js"></script>
  <script src="jquery-3.6.0.min.js"></script>
  <script src="tinycolor.mim.js"></script>
  
  <title></title>
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
         <form class="d-flex" style="" action="l.php" method="get">
        <input class="form-control me-3" type="text" placeholder="بحث" name="search">
        <!-- <br><span style="color:red;font-size:10px;">
    <?php 
        // $a=$_SESSION['sear'];
        // if($a){
        //     echo $a;
          
        // }
     ?>
     </span> -->
        <button class="btn btn-primary" type="submit">بحت</button>
      </form>
       </div>
        </div>
      </nav>
  <div class="popl">
    <div class="all">
       <h1 id="h1">الاكثر شهره</h1>
    </div>
    <div style="width: 100%; margin: 10px">
      <hr>
    </div>
    <div class="popl_img" id="pupur">
      <?php
      $json_d=file_get_contents('data.json');
      $d=json_decode($json_d,true);
      $j=1;
      foreach($d as $rr)
        {
          $img=$rr['imge'];
          $na=$rr['name']; 
          $e=$rr['whtch'];
          $l=$rr['type'];
          $i=$rr['id'];
          if(isset($_COOKIE[$i])){
            $co='red';
          }else{
          $co='blue';
          }
      if($rr['whtch']>=1000)
      {
        $e=substr($e,0,1)."K";
        if ($j<=6){
          echo"
      <div class='inhet' id='ces'>
        
     
      <div class='imge'id='ver' >
        <div class='cent' id='mydiv'>
        <img src='$img' class='cs' id='ces'>
        <div class='shadow1' style='height:5;background-color:$co' id='$i'><p style='font-size:10px'>views $e</p></div>
        <div class='shadow'><p>$na</p></div>
        <div class='shadow2' ><p>$l </p></div>
        </div>
        <h4>$na</h4>
      </div>
     
    
      
      </div>
      ";}
      $j+=1;
          }
        }
        // mysqli_close($con);
      ?>
       
   
  </div>
  </div>
  
    <div class="popl">
      <div class="spac">
      <div class="all">
        <h1 id="h" style="height: 20%;">مستمر</h1>
        
      </div>
      <h2><a href="" id='all_img'>عرض الكل</a></h2>
      </div>
      <div style="width: 100%; margin: 10px">
        <hr>
      </div>
      <div class="popl_img" id="live">
          <?php
          $json_d=file_get_contents('data.json');
          $d=json_decode($json_d,true);
          $j=1;
          foreach($d as $rr)
            {
              $img=$rr['imge'];
              $na=$rr['name']; 
              $e=$rr['whtch'];
              $l=$rr['type'];
              $i=$rr['id'];
              if(isset($_COOKIE[$i])){
                $co='red';
              }else{
              $co='blue';
              }
        if($rr['type']=='live')
        {
          if($rr['whtch']>=1000)
          $e=substr($e,0,1)."K";
          echo"
      <div class='inhet' id='ces'>
        
     
      <div class='imge' >
        <div class='cent' id='mydiv'>
        <img src='$img' class='cs' id='ces'>
        <div class='shadow1' id='$i' style='height:5%;background-color:$co'><p style='font-size:10px'> views $e</p></div>
        <div class='shadow'><p>$na</p></div>
        <div class='shadow2' ><p>$l </p></div>
        </div>
        <h4>$na</h4>
      </div>
     
    
      
      </div>
      ";
        
      }
      }
      // mysqli_close($con);
      ?>

          
      </div> 
      <div class="tail">
        <h4 >التالي</h4>

      </div>
    </div>
    <div class="popl">
      <div class="spac" id="mzed">
      <div class="all">
        <h1 id="h3"><strong>مكتمل</strong></h1>
        
      </div>
      <h2 onclick="alkl()"><a onclick="alkl()">عرض الكل</a></h2>
      </div>
      <div style="width: 100%; margin: 10px">
        <hr>
      </div>
      <div class="popl_img">
      <?php
      $json_d=file_get_contents('data.json');
      $d=json_decode($json_d,true);
      foreach($d as $rr)
        {
          $img=$rr['imge'];
          $na=$rr['name']; 
          $e=$rr['whtch'];
          $l=$rr['type'];
          $i=$rr['id'];
          if(isset($_COOKIE[$i])){
            $co='red';
          }else{
          $co='blue';
          }
        if($rr['type']=='done')
        {
          if($rr['whtch']>=1000)
          $e=substr($e,0,1)."K";
          echo"
      <div class='inhet' id='ces'>
        
     
      <div class='imge'  >
        <div class='cent' id='mydiv'>
        <img src='$img' class='cs'  >
        <div class='shadow1' style='height:5%;background-color:$co' id='$i'><p style='font-size:10px'>views $e</p></div>
        <div class='shadow'><p>$na</p></div>
        <div class='shadow2' ><p>$l </p></div>
        </div>
        <h4>$na</h4>
      </div>
     
    
      
      </div>
      ";
        }
      }
      // mysqli_close($con);
      ?>
      </div>
      <div class="tail">
        <h4 >التالي</h4>

      </div>
    </div>

    <div class="popl">
      <div class="all">
        <h1><strong>مواضيع اخرى</strong></h1>
        
      </div>
      <div style="width: 100%; margin: 10px">
        <hr>
      </div>
      <div class="sl">
        <p id="p1">الاخبار</p>
        <p id="p2">شبكات</p>
        <p id="p3">انضمة تشغيل</p>
      </div>

      <div class="popl_img" id="sl1">
        <div class="inhet">
  
  
          <div class="imge">
            <div class="cent">
              <img src="141020175737_internet_in_2040_512x288_thinkstock.jpg.webp" alt="" class="cs">
              <div class="shadow"></div>
              <div class="shadow1"><p>تقنية</p></div>
            </div>

          </div>
  
  
  
        </div>
        <div class="inhet">
  
  
          <div class="imge">
            <div class="cent">
              <img src="163575789809352100.jpg" alt="" class="cs">
              <div class="shadow"></div>
              <div class="shadow1"><p>تقنية</p></div>
            </div>

          </div>
  
  
  
        </div>
        <div class="inhet">
  
  
          <div class="imge">
            <div class="cent">
              <img src="cover-2.jpg" alt="" class="cs">
              <div class="shadow"></div>
              <div class="shadow1"><p>تقنية</p></div>
            </div>
 
          </div>
  
  
  
        </div>
        <div class="inhet">
  
  
          <div class="imge">
            <div class="cent">
              <img src="GettyImages-1322517295.jpg" alt="" class="cs">
              <div class="shadow"></div>
              <div class="shadow1"><p>تقنية</p></div>
            </div>

          </div>
  
  
  
        </div>
        <div class="inhet">
  
  
          <div class="imge">
            <div class="cent">
              <img src="internet-start-used-learn-about-3-benefits-detriments-ethics-society-300x131.jpg" alt="" class="cs">
              <div class="shadow"></div>
              <div class="shadow1"><p>تقنية</p></div>
            </div>

          </div>
  
  
  
        </div>
  
      </div>
      <div class="popl_img" id="sl2">
        <div class="inhet">
  
  
          <div class="imge">
            <div class="cent">
              <img src="NJ071.jpg" alt="" class="cs">
              <div class="shadow"></div>
              <div class="shadow1"><p>تقنية</p></div>
            </div>
   
          </div>
  
  
  
        </div>
        <div class="inhet">
  
  
          <div class="imge">
            <div class="cent">
              <img src="iStock-1174366497.jpg" alt="" class="cs">
              <div class="shadow"></div>
              <div class="shadow1"><p>تقنية</p></div>
            </div>

          </div>
  
  
  
        </div>
        <div class="inhet">
  
  
          <div class="imge">
            <div class="cent">
              <img src="Slider-9.jpg" alt="" class="cs">
              <div class="shadow1"><p>تقنية</p></div>
              <div class="shadow"></div>
            </div>

          </div>
  
  
  
        </div>
        <div class="inhet">
  
  
          <div class="imge">
            <div class="cent">
              <img src="what-hacker-3-technical-aspects-know-about-world-electronic-penetration.jpg" alt="" class="cs">
              <div class="shadow"></div>
              <div class="shadow1"><p>تقنية</p></div>
            </div>

          </div>
  
  
  
        </div>
        <div class="inhet">
  
  
          <div class="imge">
            <div class="cent">
              <img src="فوائد-واضرار-الانترنت.jpg" alt="" class="cs">
              <div class="shadow"></div>
              <div class="shadow1"><p>تقنية</p></div>
            </div>

          </div>
  
  
  
        </div>
  
      </div>
      <div class="popl_img" id="sl3">
        <div class="inhet">
  
  
          <div class="imge">
            <div class="cent">
              <img src="تعلم-الهكر-700x490.jpg" alt="" class="cs">
              <div class="shadow"></div>
              <div class="shadow1"><p>تقنية</p></div>
            </div>

          </div>
  
  
  
        </div>
        <div class="inhet">
  
  
          <div class="imge">
            <div class="cent">
              <img src="موضوع_تعبير_عن_شبكة_الإنترنت.jpg" alt="" class="cs">
              <div class="shadow"></div>
              <div class="shadow1"><p>تقنية</p></div>
            </div>

          </div>
  
  
  
        </div>
        <div class="inhet">
  
  
          <div class="imge">
            <div class="cent">
              <img src="الأمن السيبراني.jpg" alt="" class="cs">
              <div class="shadow"></div>
              <div class="shadow1"><p>تقنية</p></div>
            </div>

          </div>
  
  
  
        </div>
        <div class="inhet">
  
  
          <div class="imge">
            <div class="cent">
              <img src="introducing-internet-with-8-its-benefits-300x131.jpg" alt="" class="cs">
              <div class="shadow"></div>
              <div class="shadow1"><p>تقنية</p></div>
            </div>

          </div>
  
  
  
        </div>
        <div class="inhet">
  
  
          <div class="imge">
            <div class="cent">
              <img src="992226.jpg" alt="" class="cs">
              <div class="shadow"></div>
              <div class="shadow1"><p>تقنية</p></div>
            </div>

          </div>
  
  
  
        </div>
  
      </div>
    
    </div>
    <div class="div1">
      <p id="pr1">قانون الموقع</p>
      <p id="pr2">امريكا</p>
      <p id="pr3">اتصال</p>
    </div>
    <div class="name">
      <h1 id="hh"><i style="color:red;">Cyber</i> Security</h1>
      <h1 id="hh"><i style="color: blue;">شكرا جزيلا علئ متابعتنا
        <br>
      <a href="" id="" ></i> m35@gmail.com الرابط</h1></a>
    </div>
<script>
  $(document).ready(function(){
     var x=0;
     var s=1;
    $('#mani').click(function(){
     
      if (x==1){
        $('.item').each(function(index){
          $('#a1').text('⬅️');
          $('.item a').hide(300);
          $(this).animate({height:'5px',width:'50px',position:''},700);
          $(this).animate({top:'12px',left:'0px'},800);
          
        
           
        });
        $('.item').hide(200);
       x=0;
      }
      else{
        $('#a1').text('➡️');
        $('.item').show();
        $('#item1').animate({top:'20px',left:'-150px'},1100);
         $('#item1').animate({height:'50px',width:'50px'},1200);
        $('#item2').animate({top:'`20px',right:'20px',left:'-300px'},900);
         $('#item2').animate({height:'50px',width:'90px'},1000);
        $('#item3').animate({top:'20px',right:'20px',left:'-450px'},700);
         $('#item3').animate({height:'50px',width:'90px'},800);
         $('#item4').animate({top:'20px',left:'-600px'},500);
         $('#item4').animate({height:'50px',width:'90px'},600);
          $('.item a').show(2300);
         x=1;
      }
     
    });
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
   $('.cent').click(function(){
     
    
     
     var n=$(this).parent().find('.shadow p').text();
     var f=$(this).parent().find('.shadow1').attr('id');
     $(this).parent().find('.shadow1').css('backgroun-color','red');
     $.ajax({type:"GET",url:"viwe.php",data:{text:n,name:f},success:function(rspons) {
      $('.cent #'+f+' p').text(rspons);
      $('.cent #'+f).css('background-color','red');
      // location.reload();
      
      
       
     }});
    
});
$('#all_img').click(function(){
  // $.ajax({type:"GET",url:"data.json",dataType:'json',success:function(rspons) {
  //   const anim=rspons.slice(6);
  //   console.log(rspons);
  //   var $ge=$('.inhet').clone();
  //   $.each(anim,function(in,ua){
      
  //     $ge.find('.cs').attr('src',ua.imge);
  //     $ge.find('.shadow1').attr('id',ua.id);
  //     $ge.find('.shadow p').text(ua.name);
  //     $ge.find('.shadow2 p').text(ua.type);
      


  //   });
  // var $ge=$('.inhet').clone();
  //   $('#live').append($ge);
  

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