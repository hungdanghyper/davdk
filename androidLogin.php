<?php
if(isset($_POST['user'])&&isset($_POST['pass'])){
	$username = $_POST['user'];
	$password = $_POST['pass'];
    //$password = md5($password);
	require'ketnoi.php';
	$sql = "SELECT username, password FROM login WHERE username='$username'";
	if($conn->query($sql) == 0){
		echo "Username doesn't exist";
		exit;
	}
	else{
	$res = $conn->query($sql);
	if ($res->num_rows > 0) {
		while($row = $res->fetch_assoc()){
			if ($password == $row['password'] && $username == $row['username']) {
				echo "OK";
				exit;
			}
		}
	}
}
}
die(); 
?>
