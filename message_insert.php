<?
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
if ($_SESSION['user'] == true){
$connect = mysql_connect("localhost","root","1234");
mysql_select_db("test", $connect);

$sql = "insert into chat (writer,id_one,id_two,type,post_num,message, dtime) values";
$sql.= "('$writer','$id_one','$id_two','$type','$post_num','$message', now())";

$result = mysql_query($sql, $connect);

if($result){
    ?> <script type="text/javascript">
        window.history.back();
    </script>
    <?
}
else
    include("lboard_write.php");


mysql_close();
 }
else
    include("login.php");
?>
