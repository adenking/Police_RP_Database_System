<?php 
	// FFG Police Database
	// Created by HazardousKing - Aden King
	// Do not copy without permission
    // These variables define the connection information for your MySQL database 
    $username = "hazard"; 
    $password = "O1KmA3ONwksYHlPKyLd4"; 
    $host = "localhost"; 
    $dbname = "my_db"; 

    // UTF-8 is a character encoding scheme that allows you to conveniently store 
    // a wide variety of special characters, like ¢ or €, in your database. 
    // By passing the following $options array to the database connection code we 
    // are telling the MySQL server that we want to communicate with it using UTF-8 
    // See Wikipedia for more information on UTF-8: 
    // http://en.wikipedia.org/wiki/UTF-8 
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'); 
     
    // A try/catch statement is a common method of error handling in object oriented code. 
    // First, PHP executes the code within the try block.  If at any time it encounters an 
    // error while executing that code, it stops immediately and jumps down to the 
    // catch block.  For more detailed information on exceptions and try/catch blocks: 
    // http://us2.php.net/manual/en/language.exceptions.php 
    try 
    { 
        // This statement opens a connection to your database using the PDO library 
        // PDO is designed to provide a flexible interface between PHP and many 
        // different types of database servers.  For more information on PDO: 
        // http://us2.php.net/manual/en/class.pdo.php 
        $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options); 
    } 
    catch(PDOException $ex) 
    { 
        // If an error occurs while opening a connection to your database, it will 
        // be trapped here.  The script will output an error and stop executing. 
        // Note: On a production website, you should not output $ex->getMessage(). 
        // It may provide an attacker with helpful information about your code 
        // (like your database username and password). 
        die("Failed to connect to the database: " . $ex->getMessage()); 
    } 
     
    // This statement configures PDO to throw an exception when it encounters 
    // an error.  This allows us to use try/catch blocks to trap database errors. 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
     
    // This statement configures PDO to return database rows from your database using an associative 
    // array.  This means the array will have string indexes, where the string value 
    // represents the name of the column in your database. 
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
     
    // This block of code is used to undo magic quotes.  Magic quotes are a terrible 
    // feature that was removed from PHP as of PHP 5.4.  However, older installations 
    // of PHP may still have magic quotes enabled and this code is necessary to 
    // prevent them from causing problems.  For more information on magic quotes: 
    // http://php.net/manual/en/security.magicquotes.php 
    if(function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) 
    { 
        function undo_magic_quotes_gpc(&$array) 
        { 
            foreach($array as &$value) 
            { 
                if(is_array($value)) 
                { 
                    undo_magic_quotes_gpc($value); 
                } 
                else 
                { 
                    $value = stripslashes($value); 
                } 
            } 
        } 
     
        undo_magic_quotes_gpc($_POST); 
        undo_magic_quotes_gpc($_GET); 
        undo_magic_quotes_gpc($_COOKIE); 
    } 
     
    // This tells the web browser that your content is encoded using UTF-8 
    // and that it should submit content back to you using UTF-8 
    header('Content-Type: text/html; charset=utf-8'); 
     
    // This initializes a session.  Sessions are used to store information about 
    // a visitor from one web page visit to the next.  Unlike a cookie, the information is 
    // stored on the server-side and cannot be modified by the visitor.  However, 
    // note that in most cases sessions do still use cookies and require the visitor 
    // to have cookies enabled.  For more information about sessions: 
    // http://us.php.net/manual/en/book.session.php 
    session_start(); 

    // Note that it is a good practice to NOT end your PHP files with a closing PHP tag. 
    // This prevents trailing newlines on the file from being included in your output, 
    // which can cause problems with redirecting users.
	
	
	
	function is_valid_user()
	{
		if (isset($_SESSION['user']))
		{
			$conValidUser=mysqli_connect("localhost","hazard","O1KmA3ONwksYHlPKyLd4","my_db");

			if (mysqli_connect_errno())
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }


			 $result = mysqli_query($conValidUser," 
				SELECT 
					username
				FROM users 
				WHERE 
					username = '" . $_SESSION['user']['username'] ."'");
			
			$row = mysqli_fetch_array($result);
			mysqli_close($conValidUser);
			if(count($row) == 0)
			{
				die('Need to login.');
			}
		}
	}
	function is_valid_admin()
	{
		if (isset($_SESSION['user']))
		{
			$conAdminUser=mysqli_connect("localhost","hazard","O1KmA3ONwksYHlPKyLd4","my_db");

			if (mysqli_connect_errno())
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }

			 $result = mysqli_query($conAdminUser," 
				SELECT 
					username
				FROM users 
				WHERE username = '" . $_SESSION['user']['username'] ."' AND Admin = '1'");
					
			$row = mysqli_fetch_array($result);
			mysqli_close($conAdminUser);
			if(count($row) == 0)
			{
				die('ERROR: 403 <br>03721865219835678342907 <br> Please Report this error to your system administrator');
			}
		}
	}
	function logIt($userName, $prevData, $editor, $newData, $crimeOrLicense, $con = null)
	{
		$conLog = ($con === null ? mysqli_connect("localhost","hazard","O1KmA3ONwksYHlPKyLd4","my_db") : $con);
		$sql = "INSERT INTO log (Username,PreviousValue,Editor,newValue,licenseOrCrime)
				VALUES
				('" . $userName . "','" . $prevData . "','" . $editor . "', '" . $newData . "', '" . $crimeOrLicense . "')";
		mysqli_query($conLog, $sql);
	}