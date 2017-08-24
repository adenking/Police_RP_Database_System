<html>
<head>
<link href="http://files.enjin.com/487983/site_logo/favicon.ico?timestamp=1391127244" rel="shortcut icon" type="image/vnd.microsoft.icon">
<title>Taviana Police Database</title>
</head>
<body>
<?php
require("common.php");
if(empty($_SESSION['user'])) 
    { 
        // If they are not, we redirect them to the login page. 
        header("Location: login.php"); 
         
        // Remember that this die statement is absolutely critical.  Without it, 
        // people can view your members-only content without logging in. 
        die("Redirecting to login.php"); 
    } 
	is_valid_user();
	?>
<link rel="stylesheet" type="text/css" href="style.css">

<img src="badge.png" 
style="display: block; 
height: 100%;
margin-left: auto; 
margin-right: auto; 
position: relative;">
<div id="tw">
Connecting to Taviana Federal Crime Database. <br>
Connecting..... <br>
Authenticating......... <br>
Connected. <br>
Checking Network Engineer Status.... <br>
Name: HazardousKing. <br>
Status: Sleeping. <br>
Initiating Graphical User Interface....... <br>
X Window System Started.
</div>
<div id="login" >
Hello Officer <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?><br /> 
<form action="searchresult.php" method="post">
Search: <input type="text" name="searchname">
<input type="Submit">
</form>
<a href="addtodb.php"> Add User to Database</a> <br>
<a href="wantedlist.php"> View Wanted List</a> <br>
<a href="logview.php"> View Database Log</a> <br>
<?php
$con=mysqli_connect("localhost","hazard","O1KmA3ONwksYHlPKyLd4","my_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result = mysqli_query($con,"SELECT * FROM users
WHERE username='" . $_SESSION['user']['username']."'");
echo '<a href="TicketSystem.php">Ticket Calculator</a><br>';
$result = mysqli_fetch_array($result);

if($result['Admin'] == 1)
{
	echo '<a href="admin.php">ADMIN ACCESS</a><br>';
}


	?>
<a href="edit_account.php">Edit Account</a><br>
<a href="logout.php">Logout</a>
</div>
<p id="copyright">
Copyright &copy 2014-<?php date_default_timezone_set('Australia/Melbourne'); echo date("Y"); ?> Aden King. All Rights Reserved.
</p>
</body>
</html>