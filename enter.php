<?
if(!isset($_SESSION['loged'])){
    exit;
}
include_once("connect.php");

$uid = $_SESSION['uid'];
$s1 = $_POST["major"];
$s2 = $_POST["will"];
$s3 = $_POST["self"];

$sql1 = "ALTER TABLE msc ADD major VARCHAR(30) AFTER uxm";
$sql2 = "ALTER TABLE msc ADD ugroup VARCHAR(30) AFTER major";
$sql3 = "ALTER TABLE msc ADD intro TEXT AFTER ugroup";

mysqli_query($conn, $sql1);
mysqli_query($conn, "UPDATE msc SET major = '$s1' WHERE id='$uid' ");

mysqli_query($conn, $sql2);
mysqli_query($conn, "UPDATE msc SET ugroup = '$s2' WHERE id='$uid' ");

mysqli_query($conn, $sql3);
mysqli_query($conn, "UPDATE msc SET intro = '$s3' WHERE id='$uid' ");

?>