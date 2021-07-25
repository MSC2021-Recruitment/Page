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
    include_once('email.php');
}
if ($stat == 8) {//检查验证码是否正确
    include_once('check.php');
}
if ($stat == 9) {//忘记密码修改密码
    include_once('forget.php');
}
if ($stat == 10) {//记得密码修改密码
    include_once('modifypass.php');
}
if ($stat == 11) {//报名信息
    include_once('enter.php');
}
if ($stat == 12) {//忘记密码修改密码发送验证码
    include_once('check_forgetcode.php');
}

?>