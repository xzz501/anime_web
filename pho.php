<?php
session_start();
//الاتصال بالقاعدة البيانات 
$con=mysqli_connect('localhost','root','','animes');
if(mysqli_connect_error())
 echo "error";
// التحقات من سلامة البيانات المدخلة

if(!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['pass'])) {
 $user=htmlspecialchars($_POST['name'],ENT_QUOTES,'UTF-8');
 $email=htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
 $pass=htmlspecialchars($_POST['pass'],ENT_QUOTES,'UTF-8');
 $r=mysqli_query($con,"SELECT * FROM users ");
 //loop الخاصة بالمستخدمين
while($rr= mysqli_fetch_array($r)) {
 if ($rr['name']===$user and $rr['email']===$email and $rr['pass']===$pass) {
  $_SESSION['username']=$user;
  $_SESSION['loggedin']=true;
  if(isset($_POST['rem'])){
    setcookie('username',"$user",time()+60*3);
  }
  // التحويل الى الصفحة الرئسية
  header("Location: what's.php");
} else {
  header("Location:index.php");
}
}
mysqli_close();
} else{ 
header("Location:index.php");
}
?>