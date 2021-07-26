<?php
session_start();
$p=$_POST['password'];
$a=$_POST['account'];
if($a=="1023797278@qq.com"&&$p="85206728z"){
        echo 1;
        $_SESSION['aloged']=1;
        $_SESSION['aid']="";
}
?>