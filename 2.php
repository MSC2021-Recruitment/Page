<?php
session_start();
$q = $_POST["username"]; //email
$p = $_POST["password"]; //password
$xm = $_POST["name"]; //true name
$sid = $_POST["school_number"]; //school card id
$uver = $_POST["verify"];

$severname = "localhost";
$username = "root";
$password = "root";
$dbname = "msc";
$conn = mysqli_connect($severname, $username, $password, $dbname);
$res = mysqli_query($conn,"SELECT * FROM msc WHERE uname = '$q'");
$row = mysqli_fetch_array($res);

//echo false;
//exit;

if(!$row) {
    
    $sql = "INSERT INTO msc (uname,upass,schoolid,uxm) VALUES ('$q','$p','$sid','$xm')";
    $uverify = $_SESSION['uveru'];
    if($uver != $uverify) {
        echo false;
        exit;
    }
    if (mysqli_query($conn, $sql)) {
        echo true;
        //echo false;
    }
    else{
        echo false;
    }
}
else{
    echo false;
}

?>
