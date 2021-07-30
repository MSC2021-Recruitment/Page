<?php

if (!isset($_SESSION['loged'])) {
    echo false;
    exit;
}

include_once("connect.php");

$uu = 'FL';
$unum = $uu . $_POST["num"];
$uans = $_POST["text"];
$umod = $_POST["mode"];
$ugroup = $_POST["group"];
class p {
    public $group;
    public $ans;
    public $mode;
}

$ques = new p();
$ques->group = $ugroup;
$ques->ans = $uans;
$ques->mode = $umod;

$json = json_encode($ques);

//echo $unum, $uans, $umod;

$sql1 = "ALTER TABLE msc ADD $unum JSON";
$sql2 = "UPDATE msc SET $unum = '$json' WHERE id = '{$_SESSION['uid']}' ";

mysqli_query($conn, $sql1);
mysqli_query($conn, $sql2);
//mysqli_query($conn, "UPDATE msc SET $unum = '$uans' WHERE id='{$_SESSION['uid']}' ");


?>