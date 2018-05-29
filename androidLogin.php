<?php
if(isset($_POST['user'])&&isset($_POST['pass'])){
	$username = $_POST['user'];
	$password = $_POST['pass'];
	echo $username." - ".$password."<br>";
	$result = "";
	require'ketnoi.php';
	$sql = "SELECT username, password FROM login WHERE username='admin'";
	$res = $conn->query($sql);
	if($res > 0 ){
		while($row = $res->fetch_assoc()){
			if ($password == $row['password']) {
				$result = "OK";
				break;
			}
		}
		echo $result;
	}
	$conn->close();
}
?>
