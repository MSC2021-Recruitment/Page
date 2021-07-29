<?php
session_start();
if(!isset($_SESSION['aloged'])) {
    echo 0;
    exit;
}

include_once("connect.php");

$sql ="select * from msc"; //SQL
$result =mysqli_query($conn,$sql);//执行SQL
$json ="";
$data =array(); //定义好一个数组.PHP中array相当于一个数据字典.
//定义一个类,用到存放从数据库中取出的数据.
class User {
    public  $name;
    public $number;
    public $email;
    public $will;
}
//
while ( $row= mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
    $user =new User();
    $user->name = $row["uxm"];
    $user->number = $row["schoolid"];
    $user->email = $row["uname"];
    if(array_key_exists('ugroup',$row))
    $user->will = $row["ugroup"];
    else
    $user->will ="暂无";
    $data[]=$user;
}

$json = json_encode($data);//把数据转换为JSON数据.
echo $json;

?>