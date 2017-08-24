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
$jailTime = 0;
$ticketAmount = 0;
$disarm = 0;
$impound = 0;
if(isset($_POST['Speeding']))
{
  if($_POST['speedAmount'] <= 10 && $_POST['speedAmount'] >= 5)
  {
    $ticketAmount += 1500;
  }
  else if ($_POST['speedAmount'] <= 20 && $_POST['speedAmount'] >= 11) {
    $ticketAmount += 2500;
  }
  else if ($_POST['speedAmount'] <= 30 && $_POST['speedAmount'] >= 21) {
    $ticketAmount += 3000;
  }
  else if ($_POST['speedAmount'] <= 40 && $_POST['speedAmount'] >= 31) {
    $ticketAmount += 5000;
  }
  else if ($_POST['speedAmount'] <= 50 && $_POST['speedAmount'] >= 41) {
    $ticketAmount += 7000;
  }
  else if ($_POST['speedAmount'] <= 60 && $_POST['speedAmount'] >= 51) {
    $ticketAmount += 9000;
  }
  else if ($_POST['speedAmount'] <= 80 && $_POST['speedAmount'] >= 61) {
    $ticketAmount += 10000;
    $impound = 1;
  }
  else if ($_POST['speedAmount'] >= 81) {
    $jailTime += 5;
    $impound = 1;
  }
  
}
if(isset($_POST['wrongSide']))
{
  $ticketAmount += 2000;
}
if(isset($_POST['licenseUnholstered']))
{
  $ticketAmount += 5000;
}
if(isset($_POST['unlicensedUnholdtered']))
{
  $ticketAmount += 7000;
  $disarm = 1;
}
if(isset($_POST['officerHarrass']))
{
  $ticketAmount += 2000;
}
if(isset($_POST['peaceDisturb']))
{
  $ticketAmount += 4000;
}
if(isset($_POST['parkingFine']))
{
  $ticketAmount += 1000;
}
if(isset($_POST['complyFine']))
{
  $ticketAmount += 2000;
}
if(isset($_POST['attemptedHomicide']))
{
  $jailTime += 8;
  
}
if(isset($_POST['Tresspassing']))
{
  $jailTime += 3;
  
}
if(isset($_POST['Homicide']))
{
  $jailTime += (10*$_POST['homicideAmount']);
  
}
if(isset($_POST['officerHomicide']))
{
  $jailTime += (15*$_POST['officerHomicideAmount']);
  
}
if(isset($_POST['Assault']))
{
  $jailTime += 6;
  
}
if(isset($_POST['officerAssault']))
{
  $jailTime += 9;
  
}
if(isset($_POST['moneyPossession']))
{
  $jailTime += 5;
  
}
if(isset($_POST['bankRobbery']))
{
  $jailTime += 15;
  
}
if(isset($_POST['shopRobbery']))
{
  $jailTime += (10*$_POST['shopRobberyAmount']);
  
}
if(isset($_POST['civRobbery']))
{
  $jailTime += (10 + (1 * (floor($_POST["civRobberyAmount"])/10000)));
  
}
if(isset($_POST['carRobbery']))
{
 $jailTime += 10;
 
}
if(isset($_POST['carOfficerRobbery']))
{
  $jailTime += 15;
  
}
if(isset($_POST['hostage']))
{
  $jailTime += 15;
  
}
if(isset($_POST['hiredAssassin']))
{
  $jailTime += 15;
  
}
if(isset($_POST['possessionDrugs']))
{
  $jailTime += 15;
  
}
if(isset($_POST['evadeCheckpoint']))
{
  $jailTime += 5;
  
}
if(isset($_POST['possessionBodyPart']))
{
  $jailTime += 7;
}
if(isset($_POST['pimp']))
{
  $jailTime += 15;
}
if(isset($_POST['blackMarketRaid']))
{
  $jailTime += 10;
}
if(isset($_POST['possessionBlackMarket']))
{
  $jailTime += 15;
}
if(isset($_POST['jailBreak']))
{
  $jailTime += (15 + $_POST['jailBreakAmount']);
}

$optJailTime = floor($ticketAmount/1000) + $jailTime;
if($optJailTime > 60)
{
  $optJailTime = 60;
}
if ($jailTime > 60) 
{
  $jailTime = 60;
}
echo "jail Time: $jailTime<br>";
echo "Ticket Price: $ticketAmount <br>";
echo "Jail Time for Refusal to pay ticket: $optJailTime";

echo "<br> <a href=private.php>Go Back</a>";
?>
</div>
<p id="copyright">
Copyright &copy 2014-<?php date_default_timezone_set('Australia/Melbourne'); echo date("Y"); ?> Aden King. All Rights Reserved.
</p>
</body>
</html>