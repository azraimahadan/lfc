<?
session_start();

if ($_SESSION['user'] == true){
$connect = mysql_connect("localhost","root","1234");
mysql_select_db("test", $connect);

$temp = $_SESSION['user'];
$sql = "update membership set id = '$id' , email = '$email', password = '$password' ";
$sql.= "where id = '$temp'";

$result = mysql_query($sql, $connect);

if($result){
    $_SESSION['user'] = $id;
    ?> <script type="text/javascript">
        alert("수정하였습니다.");
    </script>
    <?
    include("homeafterlogin.php");
}
else{
    ?> <script type="text/javascript">
                     alert("수정실패했습니다!.");
                    </script>
                 <?
    include("member_form_edit.php");
}

mysql_close();
}
else
    include("login.php");

?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />