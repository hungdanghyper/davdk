<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "loginapp";
$conn = new mysqli($servername,$username,$password,$database);
if($conn->connect_error)
	die("Not Connected".$conn->connect_error);
?>