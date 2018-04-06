<?php
sleep(5);
//file_get_contents('http://doanvdk.bugs3.com/time.php');
$url = "http://doanvdk.bugs3.com/time.php";	
//file_get_contents($url);
//alternative:
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close($ch);
echo $data;
?>
