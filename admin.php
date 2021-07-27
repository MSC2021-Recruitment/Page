<?php
session_start();
$p=$_POST['password'];
$a=$_POST['account'];
if($a=="1"&&$p="1"){
        echo 1;
        $_SESSION['aloged']=1;
        $_SESSION['aid']="";
}
?>