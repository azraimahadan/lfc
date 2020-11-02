<?php
//테이블 샐성
$connect = mysql_connect("localhost","root", "1234");
$dbconn = mysql_select_db("test",$connect);

$sql = "create table membership ( ";
$sql .= "id char(20) not null, ";
$sql .= "name varchar(30) not null,";
$sql .= "email char(30), ";
$sql .= "password varchar(30), ";
$sql .= "primary key(id))";

$result = mysql_query($sql, $connect);
if($result)
    echo "Table Ok!";
else
    echo  "Table Fail!";
    
mysql_close();

    ?>