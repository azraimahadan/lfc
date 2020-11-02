<?
session_start();
?>
<html>
    <head>
        <title>LFC Homepage</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet" type="text/css">
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
        <div class="maincontainer">
        <center>
            <form class="search" method="post" action="search.php">
            <input class="textbox2" type="text" size="100" maxlength="100" name="title" placeholder="max 50 characters"><br>
            <input type="hidden" name="mode" value="all">
                <div class="category">
		          <select name="type">
			         <option SELECTED value="">Category</option>
                     <option value="book">Books</option>
                      <option value="accessories">Accessories</option>
                      <option value="clothes">Clothes</option>
			         <option value="personal">Personal</option>
			         <option value="other">Other</option>
		          </select>
                </div>
            <input class="btn3" type="submit" value="Search">
            </form>
            <ul>
                <li><a href="?mode=all">All</a></li>
                <li><a href="?mode=found">Found</a></li>
                <li><a href="?mode=lost">Lost</a></li>
            </ul><br>
            <h3>Search results of "<? echo "$title"?>":</h3>

<?
$connect = mysql_connect("localhost","root","1234");
mysql_select_db("test", $connect);// DB 선택

if($type != null){
    $sql = "select * from fboard where title like '%$title%' and type = '$type';";
    $sql2 = "select * from lboard where title like '%$title%' and type = '$type';";
}
else{
    $sql = "select * from fboard where title like '%$title%';";
    $sql2 = "select * from lboard where title like '%$title%';";
}


$result = mysql_query($sql, $connect);
$result2 = mysql_query($sql2, $connect);

$count = 1;

    if($mode == all)
    {
        if($result){
        echo "<h3>Things Found Board</h3>";

        while ($row = mysql_fetch_array($result)){
        $num = $row[post_num];
        echo "$count.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<a href= 'fboard_read.php?num=$num'>$row[title]</a>";
        echo "<br>";
        
        $count++;
            }
        }
        if($result2){
            echo "<h3>Lost Things Board</h3>";
        
            while ($row = mysql_fetch_array($result2)){
            $num = $row[post_num];
            echo "$count.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            echo "<a href= 'lboard_read.php?num=$num'>$row[title]</a>";
            echo "<br>";
        
            $count++;
        }
    echo "<br><br><br>";
        }
}
    if($mode == found)
    {
        if($result){
        echo "<h3>Things Found Board</h3>";

        while ($row = mysql_fetch_array($result)){
        $num = $row[post_num];
        echo "$count.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<a href= 'fboard_read.php?num=$num'>$row[title]</a>";
        echo "<br>";
        
        $count++;
            }
        }
}
                
    if($mode == lost)
    {
        if($result2){
            echo "<h3>Lost Things Board</h3>";
        
            while ($row = mysql_fetch_array($result2)){
            $num = $row[post_num];
            echo "$count.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            echo "<a href= 'lboard_read.php?num=$num'>$row[title]</a>";
            echo "<br>";
        
            $count++;
        }
    echo "<br><br><br>";
        }
    }
    ?>
        <form method="post" action="homeafterlogin.php">
        <input class="btn4" type="submit" value="Return">
        </form>
        </center>
        </div>
    </body>
</html>
        
    
