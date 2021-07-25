<?php
include_once("connect.php");
$mid = $_SESSION['mid'];
$npass = $_POST["password"];
$res = mysqli_query($conn, "UPDATE msc SET  upass = '$npass' WHERE id='$mid' ");

if($res) {
    unset($_SESSION['mid']);
    echo 1;
} else {
    echo 0;
}

?>