<?php
if(isset($_POST['user'])&&isset($_POST['pass'])){
	$username = $_POST['user'];
	$password = $_POST['pass'];
	//echo $username." - ".$password;
	require'ketnoi.php';
	$sql = "SELECT username, password FROM login WHERE username='$username'";
	if($conn->query($sql) < 0){
		echo "Username doesn't exist ";
		exit();
	}
		$res = $conn->query($sql);
		$row = $res->fetch_assoc();
		if ($password == $row['password']) {
				echo "OK";
			    exit();
			}
	$conn->close();
}
?>
