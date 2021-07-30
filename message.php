<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "msc";
 
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
$sql1='select * from message where id=1';
$a=mysqli_query($conn, $sql1);
$row = mysqli_fetch_array($a);
$q='{"sender": "name","message": "x","time": "t"}';
if($row['web']==NULL)
$sql = "UPDATE message SET web=JSON_ARRAY(CONVERT('$q',JSON)) WHERE id=1;";
else{
$sql = "UPDATE message SET web=JSON_ARRAY_APPEND('".$row['web']."','$',CONVERT('$q',JSON)) WHERE id=1;";
}
if (mysqli_query($conn, $sql)) {
    echo "新记录插入成功";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>