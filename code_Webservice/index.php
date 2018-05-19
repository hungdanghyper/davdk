
<?php
$D1 = $_GET['D01'];  //BIEN VA PHUONG THUC //BIEN $D1 LAY DU LIEU DUOC TRUYEN DEN BANG PHUONG THUC $_GET TRONG TRUONG D01
$D2 = $_GET['D02'];
$D3 = $_GET['D03'];
$D4 = $_GET['D04'];

$rf = @fopen("device.json", "r") or die("can't open file");// mở file device.json với thuộc tính r (read only)
$data = fread($rf,filesize('device.json'));
fclose($rf);

if($D1 == "1") { 
  $file = @fopen("device.json", "w") or die("can't open file"); //  mở file với thuộc tính Write only
  if($data == ""){
 		fwrite($file, '{"D01":"1","D02":"0","D03":"0","D04":"0"}');//ghi nội dung vào file
 }else{
 	
 		$data[8]='1';
 		fwrite($file, $data);	
 }
 fclose($file);
} 
else if ($D1 == "0") {  
	$file = fopen("device.json", "w") or die("can't open file");
	if($data == ""){
		fwrite($file, '{"D01":"0","D02":"0","D03":"0","D04":"0"}');
	}else{
		$data[8]='0';
		fwrite($file, $data);	
	}
	fclose($file);
}else if ($D2 == "0") {  
	$file = fopen("device.json", "w") or die("can't open file");
	if($data == ""){

		fwrite($file, '{"D01":"0","D02":"0","D03":"0","D04":"0"}');

	}else{
		$data[18]='0';
		fwrite($file, $data);	
	}
	fclose($file);
}else if ($D2 == "1") {  
	$file = fopen("device.json", "w") or die("can't open file");
	if($data == ""){

		fwrite($file, '{"D01":"0","D02":"1","D03":"0","D04":"0"}');

	}else{
		$data[18]='1';
		fwrite($file, $data);	
	}
	fclose($file);
}else if ($D3 == "0") {  
	$file = fopen("device.json", "w") or die("can't open file");
	if($data == ""){

		fwrite($file, '{"D01":"0","D02":"0","D03":"0","D04":"0"}');

	}else{
		$data[28]='0';
		fwrite($file, $data);	
	}
	fclose($file);
}else if ($D3 == "1") {  
	$file = fopen("device.json", "w") or die("can't open file");
	if($data == ""){

		fwrite($file, '{"D01":"0","D02":"0","D03":"1","D04":"0"}');

	}else{
		$data[28]='1';
		fwrite($file, $data);	
	}
	fclose($file);
}else if ($D4 == "0") {  
	$file = fopen("device.json", "w") or die("can't open file");
	if($data == ""){

		fwrite($file, '{"D01":"0","D02":"0","D03":"0","D04":"0"}');

	}else{
		$data[38]='0';
		fwrite($file, $data);	
	}
	fclose($file);
}else if ($D4 == "1") {  
	$file = fopen("device.json", "w") or die("can't open file");
	if($data == ""){

		fwrite($file, '{"D01":"0","D02":"0","D03":"0","D04":"1"}');

	}else{
		$data[38]='1';
		fwrite($file, $data);	
	}
	fclose($file);
}
?>
<html>  
<head>  
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="chip.png">
	<title> Ðồ Án LTHT-VÐK </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<style>
.jumbotron{
	max-width: 1300px;
	margin: 0 auto;
	padding-top: 16px;
}
.size{
	font-size: 25px;
}
.center{
	max-width: 800px;
	margin:10px auto;
}
.btn {
	width: 110px;
}
</style> 

<body >
	<div class="jumbotron">
		<div class="alert alert-success" role="alert">
			<?php 
			/*session_start();
			if (isset($_SESSION['username']) && $_SESSION['username']){
				echo '<Strong>Xin Chào</strong>: '.$_SESSION['username']." ";
				echo '<a class="float-right" href="logout.php">Logout</a>';
			}
			else{
				header('Location:index.php');
				die();
			}*/
			?> 
		</div>
		<h1 class="display-4 text-center">ĐỒ ÁN LẬP TRÌNH HỆ THỐNG VÀ VI ĐIỀU KHIỂN</h1>
		<p class="display-5 text-xl-center text-primary size"> ĐẶNG BÁ HÙNG - NGUYỄN TIẾN DŨNG - PHAN KIỀU HƯNG</p>
		<hr class="my-4">
		<p class="display-5 text-xl-center text-justify size">BẢNG ĐIỀU KHIỂN THIẾT BỊ</p>
		<div class="w-75 center">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">ID Device</th>
						<th scope="col">Name Device</th>
						<th scope="col">ON</th>
						<th scope="col">OFF</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">D01</th>
						<th scope="row">Light</th>
						<td><a href="?D01=1" type="button" class="btn btn-outline-primary">Light ON</a></td>
						<td><a href="?D01=0" type="button" class="btn btn-outline-primary">Light OFF</a></td>
					</tr>
					<tr>
						<th scope="row">D02</th>
						<th scope="row">Fan</th>
						<td><a href="?D02=1" type="button" class="btn btn-outline-primary">Fan ON</a></td>
						<td><a href="?D02=0" type="button" class="btn btn-outline-primary">Fan OFF</a></td>
					</tr>
					<tr>
						<th scope="row">D03</th>
						<th scope="row">Motor</th>
						<td><a href="?D03=1" type="button" class="btn btn-outline-primary">Motor ON</a></td>
						<td><a href="?D03=0" type="button" class="btn btn-outline-primary">Motor OFF</a></td>
					</tr>
					<tr>
						<th scope="row">D04</th>
						<th scope="row">Kettles</th>
						<td><a href="?D04=1" type="button" class="btn btn-outline-primary">Kettles ON</a></td>
						<td><a href="?D04=0" type="button" class="btn btn-outline-primary">Kettles OFF</a></td>
					</tr>
				</tbody>
			</table>
			<div class="alert alert-primary" role="alert">
				<?php
				if($data[8]=='1') $state1 = 'ON';
				else if($data[8]=='0') $state1 = 'OFF';
				if($data[18]=='1') $state2 = 'ON';
				else if($data[18]=='0') $state2 = 'OFF';
				if($data[28]=='1') $state3 = 'ON';
				else if($data[28]=='0') $state3 = 'OFF';
				if($data[38]=='1') $state4 = 'ON';
				else if($data[38]=='0') $state4 = 'OFF';
				echo "<i>Status</i>: "."&#160 &#160<strong>Light</strong>: ".$state1."&#160 &#160 <strong>Fan</strong>: ".$state2."&#160 &#160 <strong>Motor</strong>: ".$state3."&#160 &#160  <strong>Kettles</strong>: ".$state4;
				?>
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<p class="text-xl-center">&copy; Copyright By <a href="https://www.facebook.com/401xUnauthorized">Manh Hung</a></p>
	</div>
	<script type=”text/javascript”>
		function reFresh() {
			window.open(location.reload(true))
		}
		window.setInterval(“reFresh()”,<?php echo rand(1500, 3000); ?>);
	</script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
