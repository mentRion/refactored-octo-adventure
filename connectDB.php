<?php
/* Database connection settings */
	$servername = "localhost";
    $username = "root";		
//put your phpmyadmin username.(default is "root")
    $password = "";
    			
//if your phpmyadmin has a password put it here.(default is "root")
    $dbname = "rfidattendance";
    $port = "3306";
    
	$conn = mysqli_connect($servername, $username, $password, $dbname, $port);
	
	if ($conn->connect_errno) {
        die("Database Connection failed: " . $conn->connect_error);
    }
?>