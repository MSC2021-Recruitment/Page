<?php

if (!isset($_SESSION['loged'])) {
    echo false;
    exit;
}
include_once("connect.php");
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


?>