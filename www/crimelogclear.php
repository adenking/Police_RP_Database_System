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
$con=mysqli_connect("localhost","hazard","O1KmA3ONwksYHlPKyLd4","my_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$result = mysqli_query($con,"SELECT * FROM licensedata WHERE UserName='$_POST[Username]'");
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
echo "Are you sure you want to clear the following crimes? <br>";

echo "<form action=\"crimelogremove.php\" method=\"post\">";
while($row = mysqli_fetch_array($result))
{
echo "Current Crimes: <br>";
$tempCrimes = json_decode($row['Crimes'], true);
if ($tempCrimes !== null)
	{
		foreach($tempCrimes as $i => $tempCrime) 
		{
			echo '<input type="checkbox" id="remove_crime_' . $i . '" name="removeCrime[]" value="' . $tempCrime . '"> ';
			echo '<label for="remove_crime_' . $i . '">' . $tempCrime . '</label><br>';
		}
	}
}

echo "<input type=\"hidden\" name=\"Username\" value=\"" . $_POST['Username'] . "\">
<input type=\"submit\" value=\"Clear Selected Crimes\">
</form> <br>";
echo "<form action=\"crimelogremoveall.php\" method=\"post\">
<input type=\"hidden\" name=\"Username\" value=\"" . $_POST['Username'] . "\">
<input type=\"submit\" value=\"Clear All Crimes\">
</form>";

echo "<br> <a href=private.php>Go Back</a>";
mysqli_close($con);
?>
</div>
<p id="copyright">
Copyright &copy 2014-<?php date_default_timezone_set('Australia/Melbourne'); echo date("Y"); ?> Aden King. All Rights Reserved.
</p>
</body>
</html>