<?php
$lifeTime = 7 * 24 * 3600;
session_set_cookie_params($lifeTime);
session_start();
$stat = $_POST["stat"];

$severname = "localhost";
$username = "root";
$password = "root";
$dbname = "msc";

if ($stat == 1) {
    $q = $_POST["q"];
    $p = $_POST["p"];
    $conn = mysqli_connect($severname, $username, $password, $dbname);
    $result = mysqli_query($conn, "SELECT * FROM msc WHERE uname = '$q'");
    $row = mysqli_fetch_array($result);

    if (!$row) {
        echo false;
    } else {
        $upassword = $row['upass'];
        if ($p == $upassword) {
            $_SESSION['loged'] = 1;
            $_SESSION['uid'] =  $row['id'];
            echo true;
        } else {
            echo false;
        }
    }
}
if (isset($_SESSION['loged']) && $stat == 3) {
    echo true;
}
if ($stat == 2) {
    session_destroy();
}
if ($stat == 4) {
    if (isset($_SESSION['loged'])) {
        echo false;
    }
    $conn = mysqli_connect($severname, $username, $password, $dbname);
    $uu = 'FL';
    $unum = $uu . $_POST["num"];
    $umodid = $unum . "mode";
    $uans = $_POST["text"];
    $umod = $_POST["mode"];
    echo $unum, $uans, $umod;
    $sql1 = "ALTER TABLE msc ADD $unum TEXT";
    $sql2 = "ALTER TABLE msc ADD $umodid VARCHAR(30)";

    mysqli_query($conn, $sql1);
    mysqli_query($conn, "UPDATE msc SET $unum = '$uans' WHERE id='{$_SESSION['uid']}' ");

    mysqli_query($conn, $sql2);
    mysqli_query($conn, "UPDATE msc SET $umodid = '$umod' WHERE id='{$_SESSION['uid']}' ");


    //$_SESSION['ans']=$_POST['text'];
    //$_SESSION['mode']=$_POST['mode'];
    echo true;
}
if ($stat == 5) {
    if (isset($_SESSION['loged'])) {
        echo false;
    }

    $uu = 'FL';
    $unum = $uu . $_POST['num'];
    //$unum = $uu . "114514";
    $umod = $unum . "mode";

    $conn = mysqli_connect($severname, $username, $password, $dbname);
    $result = mysqli_query($conn, "SELECT * FROM msc WHERE id='{$_SESSION['uid']}' ");
    $row = mysqli_fetch_array($result);

    $ans = $row[$unum];
    $mode = $row[$umod];
    if ($ans == NULL)
        $ans = "";
    if ($mode == NULL)
        $mode = "text/x-c++src";
    $a = array("ans" => $ans, "mode" => $mode);
    echo json_encode($a);
}
if ($stat == 6) {
    $q = $_POST["username"]; //email
    $p = $_POST["password"]; //password
    $xm = $_POST["name"]; //true name
    $sid = $_POST["school_number"]; //school card id

    $severname = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "msc";
    $conn = mysqli_connect($severname, $username, $password, $dbname);
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
}
if ($stat == 7) {
    include 'email.php';
}

?>