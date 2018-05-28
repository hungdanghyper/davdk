<?php
if(isset($_POST['user'])&&isset($_POST['pass'])){
	$username = $_POST['user'];
	$password = $_POST['pass'];
	$result = "";
	require'ketnoi.php';
	$sql = "SELECT username, password FROM login WHERE username='$username'";
	$res = $conn->query($sql);
	if($res > 0 ){
		while($row = $res->fetch_assoc()){
			if ($password == $row['password']) {
				$result = "OK";
				exit;
			}
		}
	}
	echo $result;
	$conn->close();
}
die(); 
?>
