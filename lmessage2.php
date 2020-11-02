<?
session_start();
$writer = $_SESSION['user'];
//$id_two = $writer;
/*if($id_one == $id_two){            //incase chatter is same with article owner
  ?> <script type="text/javascript">
  window.history.back();
</script>
*/

?>

<html>
    <head>
        <title>LFC Homepage</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <style>
            .container1 {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

/* Darker chat container */
.darker {
  border-color: #ccc;
  background-color: #ddd;
}

/* Clear floats */
.container1::after {
  content: "";
  clear: both;
  display: table;
}

/* Style images */
.container1 img {
  float: left;
  max-width: 70px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

/* Style the right image */
.container1 img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

/* Style time text */
.time-right {
  float: right;
  color: #aaa;
}

/* Style time text */
.time-left {
  float: left;
  color: #999;
}
.maincontainer1{
    height: 50%;
    width: 30%;
    word-wrap: break-word;
    background: rgba(0,0,0,.6);
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    padding: 0 70px;
    margin-top: 50px;
}

            </style>
</head>
<body>        
        <div class="main"> 
            <div class="logo">
                <a href="homeafterlogin.php"><img src="css/logo3_edited.png"></a>
            </div>
            <ul>
                <li class="active"><a href="homeafterlogin.php">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
        <div class="maincontainer1">
<?
$connect = mysql_connect("localhost","root","1234");
mysql_select_db("test", $connect);// DB 선택

$sql = "select * from lboard where post_num = '$post_num';";
$result = mysql_query($sql, $connect);

if($result){
    while($row = mysql_fetch_array($result))
    {
        if($row[imageUp] != null)
            echo "<tr><td colspan=2><img src='luploads/$row[imageUp]' height='150px' width='250px'></td></tr>";
        echo $row[title];
    }
}

$connect = mysql_connect("localhost","root","1234");
mysql_select_db("test", $connect);// DB 선택

$sql = "select * from chat where post_num = '$post_num' and id_one='$id_one' and id_two='$id_two' and type='$type';";
$result = mysql_query($sql, $connect);

while($row=mysql_fetch_array($result)){

/*if($row[chat_id] == null){
  $sql2 = "select * from chat;";
  $result2 = mysql_query($sql2, $connect);
  while($row2= mysql_fetch_array($result2)){
    $MAX = $row2[chat_id];
    if($row2[chat_id]>$MAX){
      $MAX=$row2[chat_id];
    }
  }
  
  $chat_id = 1+$MAX;
}
else{
  $chat_id = $row[chat_id];
}
*/

if($row[id_two] == $row[writer]){
echo "<div class='container1'>";
echo  "<img src='/pics/avatarface.jpg' alt='Avatar'>";
echo "<span class='time-right'>$row[id_two]</span><br><br>";
echo  "<p>$row[message]</p><br><br>";
echo  "<span class='time-right'>$row[dtime]</span>";
echo "</div>";
}
else{
echo "<div class='container1 darker'>";
echo "<img src='/pics/avatarface.jpg' alt='Avatar' class='right'>";
echo "<span class='time-left'>$row[id_one]</span><br><br>";
echo  "<p>$row[message]</p><br><br>";
echo  "<span class='time-left'>$row[dtime]</span>";
echo "</div>";
}

}

?>
    <form action="message_insert.php"><td colspan="1"><input size="30" type="text" name="message"></td>
            <td><input class="textbox" type="hidden" name="post_num" value= "<?php echo $post_num ?>"></td>
              <td><input type ="hidden" name="writer" value="<?php echo $writer ?>"> </td>
                <td><input type="hidden" name="id_two" value= "<?php echo $id_two ?>"></td>
                <td><input type ="hidden" name="id_one" value="<?php echo $id_one ?>"> </td>
                <td><input type ="hidden" name="type" value="l"></td>
                <!--<td><input type ="hidden" name="chat_id" value="<?php echo $chat_id ?>"> </td> -->
            <td><input class="btn4" type="submit" value="Send"></td>
    </form>
    <a href="lboard_read.php?num=<? echo $post_num ?>"><button class="btn4" >Article</button></a>
</div>
