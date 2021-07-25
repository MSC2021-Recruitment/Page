<?php

if(!isset($_SESSION['loged'])){
    exit;
}

include_once("connect.php");

$olspass = $_POST["old_password"];
$npass = $_POST["new_password"];
$uid = $_SESSION['uid'];

$res = mysqli_query($conn,"SELECT * FROM msc WHERE id = '$uid'");
$row = mysqli_fetch_array($res);

$rpass = $row['upass'];

if($rpass == $olspass) {
    $res = mysqli_query($conn, "UPDATE msc SET  upass = '$npass' WHERE id='$uid' ");
    if($res) {
        echo 1;
    } else {
        echo 0;
    }
} else {
    echo 0;
}

?>