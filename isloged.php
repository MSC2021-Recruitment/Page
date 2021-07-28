<?php

session_start();
if($_SESSION['aloged'])
echo 1;
else
echo 0;
?>