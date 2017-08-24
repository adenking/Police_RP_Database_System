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
$result = mysqli_query($con,"SELECT * FROM Licensedata 
WHERE Crimes IS NOT NULL ORDER BY username");
echo "<table border='1'>


<tr>
<th>Subject</th>
<th>Drivers License</th>
<th>Crimes</th>
</tr>";
while($row = mysqli_fetch_array($result))
  {
  if($row['Crimes'] == "")
  {

  }
  else
  {
  //var_dump(json_decode($row['Crimes'], true));
  $tempCrimes = json_decode($row['Crimes'], true);
  echo "<tr>";
  echo "<td>" . $row['UserName'] . "</td>";
  echo "<td>" . ($row['DriversLicense'] == 1 ? "Yes" : "No") . "</td>";
  echo "<td>";
	if ($tempCrimes !== null)
	{
		if(count($tempCrimes) == 0)
		{
			echo "Clean record";
		}
		else
		{
			foreach($tempCrimes as $tempCrime) 
			{
				echo $tempCrime . "<br>";
			}
		}
	}
	else
	{
		echo "Clean record";
	}
  echo "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>" . " " . "</td>";
  if ($row['DriversLicense'])
  {
	echo "<td>" . "<form action=\"revokelicense.php\" method=\"post\">
					<input type=\"hidden\" name=\"Username\" value=\"" . $row['UserName'] . "\">
					<input type=\"submit\" value=\"Revoke\">
					</form>"					. "</td>";
  }
  else
  {
	echo "<td>" . "<form action=\"reinstatelicense.php\" method=\"post\">
					<input type=\"hidden\" name=\"Username\" value=\"" . $row['UserName'] . "\">
					<input type=\"submit\" value=\"Reinstate\">
					</form>"					. "</td>";
  }
  echo "<td>" . "<form action=\"crimelogadd.php\" method=\"post\">
					<input type=\"hidden\" name=\"Username\" value=\"" . $row['UserName'] . "\">
					<input type=\"submit\" value=\"Add Crime\">
					</form>";
				if ($tempCrimes !== null)
				{
					echo "<form action=\"crimelogclear.php\" method=\"post\">
					<input type=\"hidden\" name=\"Username\" value=\"" . $row['UserName'] . "\">
					<input type=\"submit\" value=\"Clear Crimes\">
					</form>";
				}
	echo "</td>";
  echo "</tr>";
	}
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