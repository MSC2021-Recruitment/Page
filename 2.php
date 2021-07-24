<?php
session_start();
include_once("connect.php");

$q = $_POST["username"]; //email
$p = $_POST["password"]; //password
$xm = $_POST["name"]; //true name
$sid = $_POST["school_number"]; //school card id
$uver = $_POST["verify"];
$codetm = $q . "code";
$res = mysqli_query($conn,"SELECT * FROM msc WHERE uname = '$q'");
$row = mysqli_fetch_array($res);

if(!$row) {    
    $sql = "INSERT INTO msc (uname,upass,schoolid,uxm) VALUES ('$q','$p','$sid','$xm')";
    $codetm1 = $_SESSION[$codetm];
    $codetm2 = date('U');
    if($codetm2 - $codetm1 > 600) {
        echo 5;
    }
    $uverify = $_SESSION['uveru'];
    if($uver != $uverify) {
        echo 0;
        exit;
    }
    if (mysqli_query($conn, $sql)) {
        echo 1;
        unset($_SESSION[$q]);
        unset($_SESSION[$codetm]);
        //echo false;
    } else {
        echo 2;
    }
} else {
    echo 4;
}

?>
