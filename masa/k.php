<?php
if(!empty($_POST['name']) and !empty($_POST['pass'])){
    $asd=array("username"=>$_POST['name'],"password"=>$_POST['pass']);
    foreach ($asd as $k => $v) {
        echo "$k=$v<br>";
        # code...
    }

}