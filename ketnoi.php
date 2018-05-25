<?php
$servername = "sql9.freemysqlhosting.net";
$username = "sql9239770";
$password = "d6efQc4CkN";
$database = "sql9239770";
$conn = new mysqli($servername,$username,$password,$database);
if($conn->connect_error)
	die("Not Connected ".$conn->connect_error);
?>