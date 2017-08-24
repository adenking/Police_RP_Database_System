<html>
<head>
<link href="http://files.enjin.com/487983/site_logo/favicon.ico?timestamp=1391127244" rel="shortcut icon" type="image/vnd.microsoft.icon">
<title>Taviana Police Database</title>
</head>
<body>
<?php
require("common.php");
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
Hacking Database System.........
Connected. <br>
Checking Network Engineer Status.... <br>
Name: HazardousKing. <br>
Status: Sleeping. <br>
Read Only Access Granted. <br>
Initiating Graphical User Interface....... <br>
X Window System Started.
</div>
<div id="login" >
Hello Officer ERROR: SECURITY BREACH<br /> 
<form action="civiliansearchresult.php" method="post">
Search: <input type="text" name="searchname">
<input type="Submit">
</form>
<a href="civwantedList.php">View Wanted List</a> <br>
<a href="civilianLogView.php">View Database Log</a> <br>
<?php
$con=mysqli_connect("localhost","hazard","O1KmA3ONwksYHlPKyLd4","my_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
<a href="CivTicketSystem.php">Ticket Calculator</a><br>
<a href="index.php">Deactivate Backdoor Tools</a>
</div>
<p id="copyright">
Copyright &copy 2014-<?php date_default_timezone_set('Australia/Melbourne'); echo date("Y"); ?> Aden King. All Rights Reserved.
</p>
</body>
</html>