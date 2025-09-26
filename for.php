<?php
session_start();
$con=mysqli_connect('localhost','root','','animes');
if(mysqli_connect_error())
 echo "error";
if(!empty($_POST['phon']) and !empty($_POST['data'])){
    $pho=trim(htmlspecialchars($_POST['phon'],ENT_QUOTES,'UTF-8'));
    $dat=trim(htmlspecialchars($_POST['data'],ENT_QUOTES,'UTF-8'));
    $g=mysqli_query($con,"SELECT pass FROM users WHERE number='$pho';");
    // 
    $t=mysqli_fetch_assoc($g);
    if($t){
        $e=$t['pass'];
        echo "<script>alert('$e');</script>";
        
        // header("Location:index.php");
    }
    else{
        $_SESSION['val']="يمكن ان يكون الرقم غير موجود";
        header("Location:passcon.php");
    }
}
?>