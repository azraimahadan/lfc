<?
session_start();
if ($_SESSION['user'] == true){
$connect = mysql_connect("localhost","root","1234");
mysql_select_db("test", $connect);// DB 선택

$id= $_SESSION['user'];
$sql = "delete from membership where id = '$id'"; 
$result =mysql_query($sql, $connect);

if($result){
    session_destroy();
    ?> <script type="text/javascript">
            alert("계정 삭제했습니다.");
        </script>
    <?
    include("login.php");
}
else{
include("homeafterlogin.php");
}
}
else
    include("login.php");
?>
