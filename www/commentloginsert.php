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
    $row = mysqli_fetch_array($result);

    $currentComments = json_decode($row['Comments'], true);
    $prevData = $row['Comments'];
    $compiled = $_POST['Comment'] . "_" . $_POST['time'];
    if ($currentComments === null)
    {
     $currentComments = array($compiled);
   }
   else
   {
     array_push($currentComments, $compiled);
   }
   $newComments = json_encode($currentComments);
   $saved = mysqli_query($con, "UPDATE Licensedata SET Comments='" . $newComments . "' WHERE UserName='" . $_POST['Username'] . "'");
   
   if($saved)
   {
     echo "Comment " . $_POST['Comment'] . " added to " . $_POST['Username'];
     logIt($_POST['Username'], $prevData, $_SESSION['user']['username'], $newComments, 1, $con);
   }
   mysqli_close($con);
   ?>
   <br> <a href=private.php>Go Back<a>

 </div>
 <p id="copyright">
  Copyright &copy 2014-<?php date_default_timezone_set('Australia/Melbourne'); echo date("Y"); ?> Aden King. All Rights Reserved.
</p>
</body>
</html>