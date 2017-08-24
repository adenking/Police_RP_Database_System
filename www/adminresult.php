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
	is_valid_admin();
?>

<?php
$con=mysqli_connect("localhost","hazard","O1KmA3ONwksYHlPKyLd4","my_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
echo '<link rel="stylesheet" type="text/css" href="style.css">
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
<div id="login">';
$result = mysqli_query($con,"SELECT * FROM users
WHERE UserName LIKE '$_POST[adminname]' ORDER BY UserName");
echo "<table border='1'>
<tr>
<th>Username</th>
<th>PlayerID</th>
<th>Permitted</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  //var_dump(json_decode($row['Crimes'], true));
  echo "<tr>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['PlayerID'] . "</td>";
  echo "<td>" . ($row['Permitted'] == 1 ? "Yes" : "No") . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>" . " " . "</td>";
  echo "<td>" . " " . "</td>";
  if ($row['Permitted'])
  {
	echo "<td>" . "<form action=\"disableaccess.php\" method=\"post\">
					<input type=\"hidden\" name=\"adminname\" value=\"" . $row['username'] . "\">
					<input type=\"submit\" value=\"Disable\">
					</form>"					. "</td>";
	
  }
  else
  {
	echo "<td>" . "<form action=\"enableaccess.php\" method=\"post\">
					<input type=\"hidden\" name=\"adminname\" value=\"" . $row['username'] . "\">
					<input type=\"submit\" value=\"Enable\">
					</form>"					. "</td>";
  }
  echo "</tr>";  
  }
echo "</table>";
?>
<br> <a href=private.php>Go Back</a>
</div>
<p id="copyright">
Copyright &copy 2014-<?php date_default_timezone_set('Australia/Melbourne'); echo date("Y"); ?> Aden King. All Rights Reserved.
</p>
</body>
</html>