<?php
include_once("connect.php");
$uemail = $_POST["email"];
# $uemail = "1@3.com";
$sql ="select * from msc";
$result =mysqli_query($conn,$sql);

$sta = 0;
$end = 0;
while ($end < mysqli_num_fields($result)){
    $field = mysqli_fetch_field_direct($result, $end);
    $fieldName=$field->name;
    if($fieldName == "reg_date"){
        $sta = $end;
        break;
    }
    $end = $end + 1;
}

$end = mysqli_num_fields($result);

$result = mysqli_query($conn, "SELECT * FROM msc WHERE uname='$uemail' ");

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$s = '{';
$s = $s . '"name": ' . '"' . $row["uxm"] . '",';
$s = $s . '"number": ' . '"' . $row["schoolid"] . '",';
$s = $s . '"email": ' . '"' . $row["uname"] . '",';
$s = $s . '"will": ' . '"' . $row["ugroup"] . '",';
$s = $s . '"major": ' . '"' . $row["major"] . '",';
$s = $s . '"intro": ' . '"' . $row["intro"] . '",';
$i = 0;
$t = '"questions": {';
foreach ( $row as $field ) {
    if($i > $sta) {
        $t1 = $i - $sta;
        $t = $t . '"题' . $t1 . '": ';
        $array = json_decode($field, true);
        if(empty($array['ans'])) {
            # echo "NULL<br>";
            $t = $t . '"NULL"';
        } else {
            # echo $array['ans'] . "<br>";
            $t = $t . '"' . $array['ans'] .'"';
        }
        if($end - $i > 1 ){
            $t = $t . ",";
        }
    }
    $i = $i + 1;
}
$s = $s . $t . '}}';
echo $s;
/*
echo '{
    "name": "顾晨",
    "number": "20009200044",
    "email": "1023797278@qq.com",
    "will": "Web组",
    "major": "软件工程",
    "intro": "大家好，我叫顾晨123kdsajjdasdjikjasddddddddddddddddddddddjsdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaakdsajjdasdjikjasddddddddddddddddddddddjsdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaakdsajjdasdjikjasddddddddddddddddddddddjsdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
    "questions": {
        "题1": "include<iostream>;\nint main(){\n  std::cout<<1;\n}    ",
        "题2": "int main()"
    }
}';
*/

?>