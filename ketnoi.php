<?php
$servername = "69.12.87.130";
$username = "njgvxtrx";
$password = "Y158w6tvkB";
$database = "njgvxtrx_login";
$conn = new mysqli($servername,$username,$password,$database);
if($conn->connect_error)
	die("Not Connected".$conn->connect_error);
?>