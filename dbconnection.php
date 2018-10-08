<?php
	//declare and initialise connection parameters
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "powergen";
	
	//use PDO connection
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	    
		}
		catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

?>