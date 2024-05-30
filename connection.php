<?php

$conn = "";

try {
	$servername = "mysql.caesar.elte.hu";
	$dbname = "klevi";
	$username = "klevi";
	$password = "rSrzfCUdHYsJHo3P";

	$conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
	
$conn->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo "Kapcsolat meghiusúlt: " . $e->getMessage();
}

?>
