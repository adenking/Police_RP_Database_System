<html>
<head>
<link href="http://files.enjin.com/487983/site_logo/favicon.ico?timestamp=1391127244" rel="shortcut icon" type="image/vnd.microsoft.icon">
<title>Taviana Police Database</title>
</head>
<head>
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<img src="badge.png" 
style="display: block; 
height: 100%;
margin-left: auto; 
margin-right: auto; 
position: relative;">
<div id="tw"></div>
<script type="text/javascript">
var content = "Connecting to Taviana Federal Crime Database. ~Connecting..... ~Hacking Database System......... ~Connected. ~Checking Network Engineer Status.... ~Name: HazardousKing. ~Status: Sleeping. ~Read Only Access Granted. ~Initiating Graphical User Interface....... ~X Window System Started.";
function twDisplayTW() 
{
Display('tw',content,0);
}
loaded('tw',twDisplayTW);

var linebreak = '~'; // character to use for line break
var resetTime = 0; // set to 0 to not reset or seconds to delay before reset

function Display(id,content,num) 
{
var delay = 100; 
if (num <= content.length)
	{
		var con = content.substr(0,num); 
		document.getElementById(id).innerHTML = con.replace(RegExp(linebreak,'g'),'<br \/>'); 
		num++; 
		if (num > content.length)
		{		
		window.location.href = 'civilianBackdoor.php';
		delay = resetTime * 1000;
		}
	} 
else 
	{
		document.getElementById(id).innerHTML = ''; num = 0;
		document.location.href = login.php;
	} 
if (delay > 0) 
{
	setTimeout('Display("'+id+'","'+content+'","'+num+'")',delay);
}
}
var pageLoaded = 0; 
window.onload = function() {pageLoaded = 1;}; 
function loaded(i,f) 
{
	if (document.getElementById && document.getElementById(i) != null) 
	{
	f();
	}	
	else if (!pageLoaded) 
	{
	setTimeout('loaded(\''+i+'\','+f+')',100);
	}
}
</script>
<p id="copyright">
Copyright &copy 2014-<?php date_default_timezone_set('Australia/Melbourne'); echo date("Y"); ?> Aden King. All Rights Reserved.
</p>
</body>
</html>