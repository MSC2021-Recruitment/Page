<?php
include_once('connect.php');
session_start();

$a=$_POST['account'];
$p=$_POST['password'];

$result = mysqli_query($conn, "SELECT * FROM mentor WHERE uname = '$a'");
$row = mysqli_fetch_array($result);

if (!$row) {
        echo 0;
    } else {
        $upassword = $row['upass'];
        if ($p == $upassword) {
            $_SESSION['aloged'] = 1;
            $_SESSION['uid'] =  $row['id'];
            $_SESSION['name']=$row['uname'];
            $_SESSION['team']=$row['uteam'];
            echo 1;
        } else {
            echo 2;
        }
    }

?>