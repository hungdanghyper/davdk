<?php
if(isset($_POST['user'])&&isset($_POST['pass'])){
	$username = $_POST['user'];
	$password = $_POST['pass'];
	echo $username." - ".$password;
	require'ketnoi.php';
	$sql = "SELECT username, password FROM login WHERE username='$username'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
			echo "OK";
			exit();
		}
	} else {
		echo "0 results";
	}
	$conn->close();
}
?>
