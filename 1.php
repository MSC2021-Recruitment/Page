<?php
$lifeTime =7* 24 * 3600;
session_set_cookie_params($lifeTime);
session_start();
$stat = $_POST["stat"];
if ($stat == 1) {
    $q = $_POST["q"];
    $p = $_POST["p"];
    if ($q == 1 && $p == 1) {
        $_SESSION['loged'] = 1;
        echo 1;
    }
}
if ($_SESSION['loged'] && $stat == 3) {
    echo 1;
}
if ($stat == 2) {
    $_SESSION['loged'] = 0;
}
