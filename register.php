<?php

$q = $_POST["username"]; //email
$p = $_POST["password"]; //password
$xm = $_POST["name"]; //true name
$sid = $_POST["school_number"]; //school card id

include_once("connect.php");

$res = mysqli_query($conn, "SELECT * FROM msc WHERE uname = '$q'");
$row = mysqli_fetch_array($res);

if (!$row) {
    $sql = "INSERT INTO msc (uname,upass,schoolid,uxm) VALUES ('$q','$p','$sid','$xm')";

    if (mysqli_query($conn, $sql)) {
        echo true;
    } else {
        echo false;
    }
} else {
    echo false;
}

?>