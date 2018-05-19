<?php
$servername = "sql3.freemysqlhosting.net";
$username = "sql3231160";
$password = "Hungtan17101996";
$database = "sql3231160";
$conn = new mysqli($servername,$username,$password,$database);
if($conn->connect_error)
	die("Not Connected".$conn->connect_error);
?>