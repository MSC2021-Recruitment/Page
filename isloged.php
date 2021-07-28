<?php

session_start();
if($_SESSION['aloged'] == 1) {
    echo 1;
}
else {
    echo 0;
}

?>