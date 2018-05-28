<?php
if(isset($_POST['user'])&&isset($_POST['pass'])){
	$username = $_POST['user'];
	$password = $_POST['pass'];
	require'ketnoi.php';
	$sql = "SELECT username, password FROM login WHERE username='$username'";
	$res = $conn->query($sql);
	if($res == 0){
		echo "Username doesn't exist";
		exit;
	}
	else{
		while($row = $res->fetch_assoc()){
			if ($password == $row['password']) {
				return "OK";
				exit;
			}
		}
	}
	$conn->close();
}
die(); 
?>
