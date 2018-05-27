<?php
  if(isset($_POST['user'])&&isset($_POST['pass'])){
    $username = $_POST['user'];
    $password = $_POST['pass'];
    //$password = md5($password);
	include('ketnoi.php');
    $query = mysqli_query("SELECT username, password FROM login WHERE username='$username'");
    if (mysqli_num_rows($query) == 0) {
        echo "Username doesn't exist";
        exit;
    }

    $row = mysqli_fetch_array($query);
    if ($password != $row['password']) {
        echo "Password Wrong";
        exit;
    }
	echo "OK";
  }
    die(); 
?>
