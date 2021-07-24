<?php

include_once ("connect.php");
$q = $_POST["q"];
$p = $_POST["p"];
$result = mysqli_query($conn, "SELECT * FROM msc WHERE uname = '$q'");
$row = mysqli_fetch_array($result);

if (!$row) {
    echo 0;
//    echo false;
} else {
    $upassword = $row['upass'];
    if ($p == $upassword) {
        $_SESSION['loged'] = 1;
        $_SESSION['uid'] =  $row['id'];
        $_SESSION['name']=$row['uxm'];
        echo 1;
//        echo true;
    } else {
        echo 2;
//        echo false;
    }
}

?>