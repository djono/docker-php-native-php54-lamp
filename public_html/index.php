<?php
echo "Hello there, this is a PHP Apache container \n";

//These are the defined authentication environment in the db service

// The MySQL service named in the docker-compose.yml.
$host = 'mysql';

// Database use name
$user = 'root';

//database user password
$pass = 'syndr0mx';

// check the MySQL connection status
$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to MySQL server successfully!";
}

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass); $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to PDO server successfully"; 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage(); 
}
?>