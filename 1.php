<?php
$lifeTime = 7 * 24 * 3600;
session_set_cookie_params($lifeTime);
session_start();
$stat = $_POST["stat"];

if ($stat == 1) {
    include_once("login.php");
}
if (isset($_SESSION['loged']) && $stat == 3) {
    echo $_SESSION['name'];
}
if ($stat == 2) {
    session_destroy();
}
if ($stat == 4) {
    include_once("questionanswer.php");
    echo true;
}
if ($stat == 5) {
    include_once("getanswer.php");
}
if ($stat == 7) {
    include 'email.php';
}

?>