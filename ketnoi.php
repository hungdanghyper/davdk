<?php
$servername = "sql2.freemysqlhosting.net";
$username = "sql2231060";
$password = "";
$database = "sql2231060";
$conn = new mysqli($servername,$username,$password,$database);
if($conn->connect_error)
	die("Not Connected".$conn->connect_error);
?>