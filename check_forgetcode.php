<?php
include_once('connect.php');

$uemail  = $_POST["username"];
$codetm = $uemail . "code";
$result = mysqli_query($conn, "SELECT * FROM msc WHERE uname = '$uemail'");
$row = mysqli_fetch_array($result);

if (!$row) {
    echo -1;
    exit;
}

if(!isset($_SESSION[$uemail])) {
    $_SESSION[$uemail] = 1;
} else {
    $time1 = $_SESSION[$uemail];
    $time2 = date('U');
    if($time2 - $time1 < 120) {
        echo 120-$time2 + $time1;
        exit;
    }
}

include_once('forgetemail.php');

?>