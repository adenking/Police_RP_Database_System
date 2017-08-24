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

<body>
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
<script type="text/javascript">
    function updateSpeedText(val) {
		document.getElementById('speedText').value=val;
    }
	function updateSpeedRange(val) {
		document.getElementById('speedRange').value=val;
	}
	function updateHomicideText(val) {
		document.getElementById('homicideText').value=val;
    }
	function updateHomicideRange(val) {
		document.getElementById('homicideRange').value=val;
	}
	function updateOfficerHomicideText(val) {
		document.getElementById('officerHomicideText').value=val;
    }
	function updateOfficerHomicideRange(val) {
		document.getElementById('officerHomicideRange').value=val;
	}
	function updateJailBreakText(val) {
		document.getElementById('jailBreakText').value=val;
    }
	function updateJailBreakRange(val) {
		document.getElementById('jailBreakRange').value=val;
	}
	function updateShopRobberyText(val) {
		document.getElementById('shopRobberyText').value=val;
    }
	function updateShopRobberyRange(val) {
		document.getElementById('shopRobberyRange').value=val;
	}
	function updateCivRobberyText(val) {
		document.getElementById('civRobberyText').value=val;
    }
	function updateCivRobberyRange(val) {
		document.getElementById('civRobberyRange').value=val;
	}
	function updateJailBreakText(val) {
		document.getElementById('updateJailBreakText').value=val;
    }
	function updateJailBreakRange(val) {
		document.getElementById('updateJailBreakRange').value=val;
	}
	</script>
<div id="login" >
	<form action="CivTicket.php" method="post"> 
	Select Crimes: <br>
	<input type="checkbox" id="Speeding" name="Speeding" value="Speeding"> 
	<label for="Speeding">Speeding</label> 
	<input type="range" id="speedRange" name="speedAmount" min="5" max="200" value="5" onchange="updateSpeedText(this.value);">
	<input type="text" id="speedText" style="width: 30px" value="5" onchange="updateSpeedRange(this.value);">	<br>
	
	<input type="checkbox" id="wrongSide" name="wrongSide" value="wrongSide">  
	<label for="wrongSide">Driving on the wrong side of the road</label> <br>

	<input type="checkbox" id="licenseUnholstered" name="licenseUnholstered" value="licenseUnholstered"> 
	<label for="licenseUnholstered">Licensed Gun Unholstered</label> <br>

	<input type="checkbox" id="unlicenseUnholstered" name="unlicenseUnholstered" value="unlicenseUnholstered"> 
	<label for="unlicenseUnholstered">Unlicensed Gun Unholstered</label> <br>

	<input type="checkbox" id="officerHarrass" name="officerHarrass" value="officerHarrass"> 
	<label for="officerHarrass">Harrassing an Officer</label> <br>

	<input type="checkbox" id="peaceDisturb" name="peaceDisturb" value="peaceDisturb"> 
	<label for="peaceDisturb">Disturbing the Peace</label> <br>

	<input type="checkbox" id="parkingFine" name="parkingFine" value="parkingFine"> 
	<label for="parkingFine">Inappropriate Parking</label> <br>

	<input type="checkbox" id="complyFine" name="complyFine" value="complyFine"> 
	<label for="complyFine">Failure to Comply to an Officer's Order</label> <br>
	
	<input type="checkbox" id="attemptedHomicide" name="attemptedHomicide" value="attemptedHomicide"> 
	<label for="attemptedHomicide">Attempted Homicide</label> <br>

	<input type="checkbox" id="Tresspassing" name="Tresspassing" value="Tresspassing"> 
	<label for="Tresspassing">Tesspassing</label> <br>
	
	<input type="checkbox" id="Homicide" name="Homicide" value="Homicide"> 
	<label for="Homicide">Homicide</label> 
	<input type="range" id="homicideRange" name="homicideAmount" min="1" max="10" value="1" onchange="updateHomicideText(this.value);">
	<input type="text" id="homicideText" style="width: 30px" value="1" onchange="updateHomicideRange(this.value);">	<br>
	
	<input type="checkbox" id="officerHomicide" name="officerHomicide" value="officerHomicide"> 
	<label for="officerHomicide">Homicide of an Officer</label> 
	<input type="range" id="officerHomicideRange" name="officerHomicideAmount" min="1" max="10" value="1" onchange="updateOfficerHomicideText(this.value);">
	<input type="text" id="officerHomicideText" style="width: 30px" value="1" onchange="updateOfficerHomicideRange(this.value);">	<br>

	<input type="checkbox" id="Assault" name="Assault" value="Assault"> 
	<label for="Assault">Assault and Battery</label> <br>

	<input type="checkbox" id="officerAssault" name="officerAssault" value="officerAssault"> 
	<label for="officerAssault">Assault and Battery of an Officer</label> <br>

	<input type="checkbox" id="moneyPossession" name="moneyPossession" value="moneyPossession"> 
	<label for="moneyPossession">Possession of Dirty Money</label> <br>

	<input type="checkbox" id="bankRobbery" name="bankRobbery" value="bankRobbery"> 
	<label for="bankRobbery">Robbery of Bank</label> <br>

	<input type="checkbox" id="shopRobbery" name="shopRobbery" value="shopRobbery"> 
	<label for="shopRobbery">Gas Station/Supermarket Robbery</label> 
	<input type="range" id="shopRobberyRange" name="shopRobberyAmount" min="1" max="10" value="1" onchange="updateShopRobberyText(this.value);">
	<input type="text" id="shopRobberyText" style="width: 30px" value="1" onchange="updateShopRobberyRange(this.value);">	<br>

	<input type="checkbox" id="civRobbery" name="civRobbery" value="civRobbery"> 
	<label for="civRobbery">Robbery People</label> 
	<input type="range" id="civRobberyRange" name="civRobberyAmount" min="1" max="200" value="1" onchange="updateCivRobberyText(this.value);">
	<input type="text" id="civRobberyText" style="width: 30px" value="1" onchange="updateCivRobberyRange(this.value);">K Stolen<br>

	<input type="checkbox" id="carRobbery" name="carRobbery" value="carRobbery"> 
	<label for="carRobbery">Attempted/Successful Vehicle Theft</label> <br>

	<input type="checkbox" id="carOfficerRobbery" name="carOfficerRobbery" value="carOfficerRobbery"> 
	<label for="carOfficerRobbery">Any Civilian in and/or Theft of a Police Vehicle</label> <br>

	<input type="checkbox" id="hostage" name="hostage" value="hostage"> 
	<label for="hostage">Hostage Taking/Kidnapping</label> <br>

	<input type="checkbox" id="hiredAssassin" name="hiredAssassin" value="hiredAssassin"> 
	<label for="hiredAssassin">For Hire Assassin</label> <br>

	<input type="checkbox" id="possessionDrugs" name="possessionDrugs" value="possessionDrugs"> 
	<label for="possessionDrugs">Possession/Distribution of Drugs</label> <br>

	<input type="checkbox" id="evadeCheckpoint" name="evadeCheckpoint" value="evadeCheckpoint"> 
	<label for="evadeCheckpoint">Running/Evading a Checkpoint</label> <br>

	<input type="checkbox" id="possessionBodyPart" name="possessionBodyPart" value="possessionBodyPart"> 
	<label for="possessionBodyPart">Possession of Body Parts</label> <br>

	<input type="checkbox" id="pimp" name="pimp" value="pimp"> 
	<label for="pimp">Prostitution/Being a Pimp</label> <br>

	<input type="checkbox" id="blackMarketRaid" name="blackMarketRaid" value="blackMarketRaid"> 
	<label for="blackMarketRaid">At Black Market during a Raid</label> <br>

	<input type="checkbox" id="possessionBlackMarket" name="possessionBlackMarket" value="possessionBlackMarket"> 
	<label for="possessionBlackMarket">Possession of Black Market Vehicles</label> <br>

	<input type="checkbox" id="jailBreak" name="jailBreak" value="jailBreak"> 
	<label for="jailBreak">Jail Break</label> 
	<input type="range" id="jailBreakRange" name="jailBreakAmount" min="1" max="200" value="1" onchange="updateJailBreakText(this.value);">
	<input type="text" id="jailBreakText" style="width: 30px" value="1" onchange="updateJailBreakRange(this.value);"><br>

	<input type="submit" value="Calculate Ticket and Jail Time">
	</form>

	<br> <a href=civilianBackdoor.php>Go Back</a>
	</div>
	<p id="copyright">
Copyright &copy 2014-<?php date_default_timezone_set('Australia/Melbourne'); echo date("Y"); ?> Aden King. All Rights Reserved.
</p>
	</body>
	</html>

