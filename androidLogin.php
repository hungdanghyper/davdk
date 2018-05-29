<?php
if(isset($_POST['user'])&&isset($_POST['pass'])){
	$username = $_POST['user'];
	$password = $_POST['pass'];
	//echo $username." - ".$password;
	require'ketnoi.php';
	$sql = "SELECT username, password FROM login WHERE username='admin'";
	$res = $conn->query($sql);
	if($res < 0){
		echo "Username doesn't exist ";
		exit();
	}
		while($row = $res->fetch_assoc()){
			if ($password == $row['password']) {
				echo "OK";
			    exit();
			}
		}
	}
	$conn->close();
}
?>
