<?
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
if ($_SESSION['user'] == true){
$connect = mysql_connect("localhost","root","1234");
mysql_select_db("test", $connect);

$target_dir = "fuploads/";
$target_file = $target_dir.basename($_FILES["imageUp"]["name"]);
move_uploaded_file($_FILES["imageUp"]["tmp_name"], $target_file);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$image=basename($_FILES["imageUp"]["name"],".jpg"); // used to store the filename in a variable
    
$id = $_SESSION['user'];
$sql = "insert into fboard (id,title,type,location,content,imageUp, time) values";
$sql.= "('$id','$title','$type','$location','$content','$image',now())";

$result = mysql_query($sql, $connect);

if($result){
    ?> <script type="text/javascript">
        alert("등록되었습니다.");
    </script>
    <?
    include("fboard_main.php");
}
else
    include("fboard_write.php");


mysql_close();
 }
else
    include("login.php");
?>

