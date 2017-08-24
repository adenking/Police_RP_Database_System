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
<div id="login">
<?php
$con=mysqli_connect("localhost","hazard","O1KmA3ONwksYHlPKyLd4","my_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="INSERT INTO Licensedata (UserName, DriversLicense)
VALUES
('" . $_POST['username'] . "','" . (isset($_POST['drivers']) ? $_POST['drivers'] : 0) . "')";
$drive = (isset($_POST['drivers']) ? $_POST['drivers'] : 0);
logIt($_POST['username'], 2, $_SESSION['user']['username'], $drive, 0, $con);

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo $_POST['username'] . " Added To Database";
echo "<br> <a href=private.php>Go Back</a>";
mysqli_close($con);
?>
</div>div
<p id="copyright">
Copyright &copy 2014-<?php date_default_timezone_set('Australia/Melbourne'); echo date("Y"); ?>-<?php date_default_timezone_set('Australia/Melbourne'); echo date("Y"); ?> Aden King. All Rights Reserved.
</p>
</body>
</html>
