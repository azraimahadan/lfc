<?php
session_start();
if ($_SESSION['user'] == true){
$connect = mysql_connect("localhost","root","1234");
mysql_select_db("test", $connect);// DB 선택

$id = $_SESSION['user'];

$sql = "delete from fboard where post_num = '$num'"; 
$result =mysql_query($sql, $connect);

$sql2 = "delete from chat where post_num = '$num' and type='f'"; 
$result2 =mysql_query($sql2, $connect);

if($result){
?> <script type="text/javascript">

        alert("삭제하였습니다.");
    </script>
    <?
    include("fboard_main.php");
}
else
{
?> <script type="text/javascript">
        alert("삭제실패하였습니다.");
    </script>
    <?
    include("fboard_main.php");
}
}
else
    include("login.php");
?>