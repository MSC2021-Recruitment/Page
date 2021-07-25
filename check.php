<?php

$uemail  = $_POST["username"];
$uver = $_POST["verify"];
$codetm = $uemail . "code";

$codetm1 = $_SESSION[$codetm];
$codetm2 = date('U');
if($codetm2 - $codetm1 > 600) {
    unset($_SESSION[$codetm]);
    echo -1;
    exit;
}
$uverify = $_SESSION['uveru'];
if($uver != $uverify) {
    echo 0;
    exit;
} else {
    unset($_SESSION['uveru']);
    unset($_SESSION[$uemail]);
    unset($_SESSION[$codetm]);
    echo 1;
}

?>