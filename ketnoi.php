<?php
/*$servername = "sql9.freemysqlhosting.net";
$username = "sql9239770";
$password = "d6efQc4CkN";*/
$servername = "localhost";
$username = "njgvxtrx";
$password = "Y158w6tvkB";
$database = "njgvxtrx_login";
$conn = new mysqli($servername,$username,$password,$database);
if($conn->connect_error)
	die("Not Connected".$conn->connect_error);
?>