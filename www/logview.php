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
$result = mysqli_query($con,"SELECT * FROM log ORDER BY id DESC LIMIT 300");
echo "<table border='0'>
<tr>
<th>Subject</th>
<th>Type</th>
<th>Previous Log</th>
<th>Current Log</th>
<th>Editor</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  $prevValue = json_decode($row['PreviousValue'], true);
  $newValue = json_decode($row['newValue'], true);
  $userName = $row['Username'];
  $licenseOrCrime = $row['licenseOrCrime'];
  $Editor = $row['Editor'];

  echo "<tr>";
  echo "<td>" . $row['Username'] . "</td>";
  echo "<td>" . ($licenseOrCrime == 1 ? "Crime" : "License") . "</td>";
  echo "<td>";
	if ($licenseOrCrime == 1)
	{
	if ($prevValue !== null )
	{
		if(count($prevValue) == 0)
		{
			echo "Clean record";
		}
		else
		{
			foreach($prevValue as $tempCrime) 
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
	echo "<td>";
	if ( $newValue !== null)
	{
		if(count($newValue) == 0)
		{
			echo "Clean record";
		}
		else
		{
			foreach($newValue as $tempCrime) 
			{
				echo $tempCrime . "<br>";
			}
		}
	}
	else
	{
		echo "Clean record";
	}
	}
	else
	{
		if ($prevValue == 2)
		{
			echo "New Subject" . "<br>";
		}
		else if ($prevValue == 3)
		{
			echo "Deleted Subject" . "<br>";
		}
		else if ($prevValue == 1)
		{
			echo "Licensed" . "<br>";
		}
		else
		{
			echo "No License" . "<br>";
		}
		echo "<td>";
		if ($newValue == 1)
		{
			echo "Licensed" . "<br>";
		}
		else
		{
			echo "No License";
		}
	}
  echo "</td>";
  echo "<td>" . $Editor . "</td>";
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