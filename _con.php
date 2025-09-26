<?php
// بداية الجلسة
session_start();
$eror=null;
function chakuser(){
    // التحقق من ان طول اسم المستخدم 
    global $eror;
    if (!empty($_POST['name'])){
        $user=trim(htmlspecialchars($_POST['name'],ENT_QUOTES,'UTF-8'));
        if(preg_match('/^[\p{Arabic}\s]{7,30}$/u',$user)){
            return true;

        }
        else{
            $eror="اسم المستخدم خاطئ";
            
            // header('Location:singin.php');
            $_SESSION['n']=1;
            return false;
        }
    }
    else{
        $eror="يوجد  حقل الفارغ";
        //header('Location:singin.php');
        $_SESSION['n']=1;

        return false;
    }
    
}
// دالة التحقق من كلمة المرور
function chakpass(){
    global $eror;
    // التحقق من طول كلمة المرور
    if(!empty($_POST['pass']) and !empty($_POST['pass1'])){
        $pas=trim(htmlspecialchars($_POST['pass'],ENT_QUOTES,'UTF-8'));//منع الحقن و قص المسافات
        $pass1=trim(htmlspecialchars($_POST['pass1'],ENT_QUOTES,'UTF-8'));
        if(preg_match('/^[A-z0-9]{10,20}$/',$pas) and preg_match('/^[A-z0-9]{10,20}$/',$pass1)){
            // تطابق كلمات المرور
            if($pas==$pass1){
                return true;
            }
            else{
                $eror="كلمات المرور غير متطابقة";
                $_SESSION['n']=4;
                return false;

            }
        }
        else{
            $eror="يجب ان تكون اكبر من 10 وتحتوي على حروف ورقام";
            $_SESSION['n']=3;
            return false;
        }
    }
    else{
        $eror="ادخل القيم الفارغه";
        return false;
    }
}
// التحقق من الايمال
function chaemal(){
    global $eror;
    if(!empty($_POST['email'])){
        $emal=trim(htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8'));
        if(filter_var($emal,FILTER_VALIDATE_EMAIL)){
            return true;
        }
        else{
            $eror="ادخل ايمل صحيح";
            $_SESSION['n']=2;
            return false;
            
        }
    }
    else {
        $eror="ادخل الحقل الغارغ";
         $_SESSION['n']=2;
        return false;
    }
}
function chack_phon_date(){
    global $eror;
    if(!empty($_POST['phon']) and !empty($_POST['data'])){
        $phon=trim(htmlspecialchars($_POST['phon'],ENT_QUOTES,'UTF-8'));
        if(preg_match('/^[0-9]{9}$/',$phon)){
            return true;
        } 
        else {
            $eror="ادخل ارقام";
            $_SESSION['n']=5;
            return false;
        }
    }
    else{
        $eror="ادخل القيمه الفارغة";
        $_SESSION['n']=5;
        return false;
    }
}
if(chakuser() && chakpass() && chaemal()){
$con=mysqli_connect('localhost','root','','animes');
if(mysqli_connect_error()){
    echo "error";
}
$name=$_POST['name'];
$pho=intval($_POST['phon']);
$em=$_POST['email'];
$ps=$_POST['pass'];
$da=$_POST['data'];
mysqli_query($con,"INSERT INTO users(name,number,email,pass,data) VALUES('$name',$pho,'$em','$ps','$da');");
mysqli_close($con);
$_SESSION['loggedin']=true;
header("Location:what's.php");
}
else{
    $_SESSION['value']=$eror;
    header('Location:singin.php');
}
?>