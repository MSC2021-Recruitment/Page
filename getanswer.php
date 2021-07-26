<?php

if (!isset($_SESSION['loged'])) {
    echo false;
    exit;
}
$uu = 'FL';
$unum = $uu . $_POST['num'];
//$unum = $uu . "114514";
$umod = $unum . "mode";

include_once("connect.php");

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

?>