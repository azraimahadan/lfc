<?
session_start();

if ($_SESSION['user'] == true){
$connect = mysql_connect("localhost","root","1234");
mysql_select_db("test", $connect);

$id = $_SESSION['user'];
$num = $_GET['post_num'];
$sql = "insert into comment (id,post_num, message,type, dtime) values";
$sql.= "('$id',$post_num,'$message','$type', now())";

$result = mysql_query($sql, $connect);

/*if($result){
    if($type="l"){ //Check comment from which board
    include("lboard_main.php");
    }
    else if($type="f"){
       include("fboard_main.php");
    }
}
else
    header("location: homeafterlogin.php");
*/
if($result){
    ?> <script type="text/javascript">
        alert("등록되었습니다.");
        window.history.back();
    </script>
    <?
}
else
    include("fboard_write.php");


mysql_close();
 }
else
    include("login.php");
?>
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />