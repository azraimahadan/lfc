<?php
session_start();
if ($_SESSION['user'] == true){
$connect = mysql_connect("localhost","root","1234");
mysql_select_db("test", $connect);// DB 선택

$id = $_SESSION['user'];

$sql = "delete from comment where comment_id = '$comment_id'"; 
$result =mysql_query($sql, $connect);

if($result){
    ?> <script type="text/javascript">
            alert("삭제하였습니다.");
            window.history.back();
        </script>
        <?
    }
    else
    {
    ?> <script type="text/javascript">
            alert("삭제실패하였습니다.");
            window.history.back();
        </script>
        <?
    }
    }
    else
        include("login.php");
    ?>