<?php
$username = 'u106226282_dgoJ2 ';
$password = '2j(urffsW';
$db = 'u106226282_5YXRN';
$servername = "mysql.hostinger.com";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else echo "oh ya!";

?>