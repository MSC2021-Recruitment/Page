<?php
$q = $_POST["q"];
$p = $_POST["p"];

$severname = "localhost";
$username = "root";
$password = "123456";
$dbname = "msc";
$conn = mysqli_connect($severname, $username, $password, $dbname);
$result = mysqli_query($conn,"SELECT * FROM msc WHERE uname = '$q'");
$row = mysqli_fetch_array($result);

if(!$row) {
    $sql = "INSERT INTO msc (uname,upass) VALUES ('$q','$p')";

    if (mysqli_query($conn, $sql)) {
        echo true;
    }
    else{
        echo false;
    }
}
else{
    echo false;
}

?>
