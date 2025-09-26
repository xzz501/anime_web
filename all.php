<?php
session_start();
if ($_SESSION['loggedin']){
    $c=$_GET['text'];
    if($c==1){
        $json_d=file_get_contents('data.json');
      $d=json_decode($json_d,true);
      if(isset($d[6])){
          
          foreach($d as k=>val)
          if(k>6){
              
          }
      }
    }
}
?>