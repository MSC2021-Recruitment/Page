<?php

if (!isset($_SESSION['loged'])) {
    echo false;
    exit;
}

$uu = 'FL';
$unum = $uu . $_POST['num'];
//$unum = $uu . "114514";

include_once("connect.php");

$result = mysqli_query($conn, "SELECT * FROM msc WHERE id='{$_SESSION['uid']}' ");
$row = mysqli_fetch_array($result);

$ans = $row[$unum];

if($ans == NULL) {
    class Emp {
        public $group;
        public $ans;
        public $mode;
     }
     $e = new Emp();
     $e->group = "";
     $e->ans = "";
     $e->mode = "text/x-c++src";
     echo json_encode($e);
}
else {
    echo $ans;
}

?>