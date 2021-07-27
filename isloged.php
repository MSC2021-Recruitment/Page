<?php
$lifeTime = 7 * 24 * 3600;
session_set_cookie_params($lifeTime);
session_start();
if($_SESSION['aloged'])
echo 1;
else
echo 0;
?>