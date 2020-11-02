<?php
session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
if ($_SESSION['user'] == true){
    $id = $_SESSION['user'];
?>

<html>
    <head>
        <title>LFC Homepage</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript">
        function logout(){
            alert("로그아웃되었습니다.");
        }
    </script>
    </head>
    <body>        
        <div class="main"> 
            <div class="logo">
                <a href="homeafterlogin.php"><img src="css/logo3_edited.png"></a>
            </div>
            <ul>
                <li class="active"><a href="#">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="noti.php">Notifications</a></li> 
            </ul>
        </div>
    <? 
        $connect = mysql_connect("localhost","root","1234");
        mysql_select_db("test", $connect);
        $sql = "select * from lboard where id='$id'";
        $result = mysql_query($sql, $connect);
    
        while($row = mysql_fetch_array($result)){
            $a = $row[location];
            $b = $row[type];
            $sqlT = "select * from fboard where location like '%$a%' or type='$b'";
            $resultT = mysql_query($sqlT, $connect);
            echo "<table width=100%><tr>";
            while($rowT = mysql_fetch_array($resultT)){
                
                echo "<th><a href = 'fboard_read.php?num=$rowT[post_num]'><img src='fuploads/$row[imageUp]' height='150px' width='300px'></a><br>Found Location = ".$rowT[location]."<br>Type = ".$rowT[type]."<br>Found Time = ".$rowT[time]."<th>";
            }
            echo "</tr></table>";
            break;
        }
            
    
    ?>
        <div class="maincontainer">
        <center>
            <h1>Welcome! <? echo "<strong>".$_SESSION['user']."!</strong>" ?></h1>
            <h2>What are you looking for?</h2>
            <form class="search" method="post" action="search.php">
            <input class="textbox2" type="text" maxlength="50" name="title" placeholder="max 50 characters"><br>
            <input type="hidden" name="mode" value="all">
                <div class="category">
		          <select name="type">
			         <option size="30" SELECTED value="">Category</option>
                     <option value="book">Books</option>
                      <option value="accessories">Accessories</option>
                      <option value="clothes">Clothes</option>
			         <option value="personal">Personal</option>
			         <option value="other">Other</option>
		          </select>
                </div>
            <input class="btn3" type="submit" value="Search">
            </form>
            <a href="lboard_main.php"><button class="btn3">Lost Things</button></a>
            <a href="fboard_main.php"><button class="btn3">Things Found</button></a>
            <a href="member_form_edit.php"><button class="btn3">Edit Profile</button></a> 
            <a href="login.php?mode=logout"><button class="btn4">Log Out</button></a>
            </center>
        </div>
    </body>
</html>
<?
        }
        else{
	       include("login.php");
	       }
        ?>


