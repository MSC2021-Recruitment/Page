<?php
$lifeTime =7* 24 * 3600;
session_set_cookie_params($lifeTime);
session_start();
$stat = $_POST["stat"];

if ($stat == 1) {
    $q = $_POST["q"];
    $p = $_POST["p"];

    $severname = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "msc";
    $conn = mysqli_connect($severname, $username, $password, $dbname);
    $result = mysqli_query($conn,"SELECT * FROM msc WHERE uname = '$q'");
    $row = mysqli_fetch_array($result);
    
    if(!$row) {
        echo false;
    }
    else {
        $upassword = $row['upass'];
    
        if($p == $upassword) {
            $_SESSION['loged'] = 1;
            echo true;
        }
        else {
            echo false;
        }
    }
/*
    if ($q == 1 && $p == 1) {
        $_SESSION['loged'] = 1;
        echo 1;
    }
*/
}
if ($_SESSION['loged'] && $stat == 3) {
    echo 1;
}
if ($stat == 2) {
    $_SESSION['loged'] = 0;
}
if($stat==4)
{
    $_SESSION['ans']=$_POST['text'];
    $_SESSION['mode']=$_POST['mode'];
    echo 0;
}
if($stat==5)
{
    $ans= $_SESSION['ans'];
    $mode=$_SESSION['mode'];
    $a=array("ans"=>$ans,"mode"=>$mode);
    echo json_encode($a);
}
?>