<div class="dangnhapdc" style="float:right; margin-right:6px;">
        <?php 
       	   session_start();
       if (isset($_SESSION['username']) && $_SESSION['username']){
           echo '<Strong>Xin Chào</strong>: '.$_SESSION['username']." ";
           echo '<a href="logout.php">Logout</a>';
       }
       else{
           echo "ban chua dang nhap";
       		   die();
       }
       ?> 
   </div>
<?php
 
$D1 = $_GET['D01'];  //BIEN VA PHUONG THUC //BIEN $D1 LAY DU LIEU DUOC TRUYEN DEN BANG PHUONG THUC $_GET TRONG TRUONG D01
$D2 = $_GET['D02'];
$D3 = $_GET['D03'];
$D4 = $_GET['D04'];

$rf = fopen("device.json", "r") or die("can't open file");// mở file device.json với thuộc tính r (read only)
$data = fread($rf,filesize('device.json'));// Đọc file và trả về nội dung vào data
    
fclose($rf);
 
if($D1 == "1") { 
  $file = fopen("device.json", "w") or die("can't open file"); //  mở file với thuộc tính Write only
  if($data == ""){
 
 	fwrite($file, '{"D01":"1","D02":"0","D03":"0","D04":"0"}'); //ghi nội dung vào file
 
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
   
    <title> Ðồ Án LTHT-VÐK </title>
   
<script type=”text/javascript”>
    function reFresh() {
      window.open(location.reload(true))
    }
    window.setInterval(“reFresh()”,<?php echo rand(1500, 3000); ?>);
</script>
   
    <script src="http://code.jquery.com/jquery-latest.js"></script>
      <style>
.current { color: red; }
  </style>
  <script>
  $(function(){
        $('.btn btn-primary btn-block btn-lg').click(function(){
        $('.btn btn-primary btn-block btn-lg').removeClass();
        $(this).addClass('current');
    });
});
  </script>
     <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
 
  </head>
  <style> body{background: #dddddd  } </style> 
 
 <body >

    <div class="row" style="margin-top: 0px;" >
		<table width="100%" height="70"> 
			<tr>
				<td align='center' > <h1> <font color='red' > <b> ĐỒ ÁN LẬP TRÌNH HỆ THỐNG VÀ VI ĐIỀU KHIỂN </b> </font> </h1> </td>
			</tr>
		</table>
		<table  width="100%" height="40">
			<tr>
				<td bgcolor="#5c5d5d" align='center' > <font color='white' > <b> HỒ TÁ QUÝ - ĐINH HỮU QUÂN - BÙI VIẾT TOÀN </b> </font> </td>
			</tr>
        </table>
		<table width=100% align='center' border='2'>
			<tr colsD02="5"> <div class="speed-slow"></div> <h3 align='center'> <font color='blue' > <b> BẢNG ĐIỀU KHIỂN THIẾT BỊ </b> </font> </h3> <tr>
			
			<tr valign="top">
				<td width=25% bgcolor="#b2b1b1"> </td> 
               
				 <td width=10% bgcolor="#dadbdc" align='center'> <br />
					<a> <b> ID Device </b> </a> <br /> <br /> <br />
					<a> <b> D01 </b> </a> <br /><br /><br />
					<a> <b> D02 </b> </a> <br /><br /><br />
					<a> <b> D03 </b> </a> <br /><br /><br />
					<a> <b> D04 </b> </a> <br /><br />
					
				
				</td>
				<td width=20%  align='center'>
					<div class="col-md-8 col-md-offset-2" >	
						<table> <br />	
						<tr><a align='center'> <b> ON  </b> </a><tr>
						<br />	<br />					
						<tr><a href="?D01=1" class="btn btn-primary btn-block btn-lg">Light On</a> </tr>
						<tr><a href="?D02=1" class="led btn btn-danger btn-block btn-lg">Fan On</a>	 </tr>			
						<tr><a href="?D03=1" class="btn btn-primary btn-block btn-lg">Motor On </a> </tr>
						<tr><a href="?D04=1" class="led btn btn-danger btn-block btn-lg" style="font-size:16px">Water Header On</a></tr>
						</table>
					</div>
				</td>
				<td width=20% align='center' >
					<div class="col-md-8 col-md-offset-2">	<br />
						<a align='center'> <b> OFF </b> </a> <br />
						<br />					
						<a href="?D01=0" class="btn btn-primary btn-block btn-lg">Light Off</a>
						<a href="?D02=0" class="led btn btn-danger btn-block btn-lg">Fan Off</a>				
						<a href="?D03=0" class="btn btn-primary btn-block btn-lg">Motor Off</a>		
						<a href="?D04=0" class="led btn btn-danger btn-block btn-lg" style="font-size:16px">Water Header Off</a><br />
					</div>
				</td>
				<td width=25% bgcolor="#b2b1b1"> </td>
			</tr>
			<br />
			</table>
				<div class="D01-status well" style= "background: #dddddd; text-align:center">
				<?php
					if($data[8]=='1') $state1 = 'ON';
					else if($data[8]=='0') $state1 = 'OFF';
					if($data[18]=='1') $state2 = 'ON';
					else if($data[18]=='0') $state2 = 'OFF';
					if($data[28]=='1') $state3 = 'ON';
					else if($data[28]=='0') $state3 = 'OFF';
					if($data[38]=='1') $state4 = 'ON';
					else if($data[38]=='0') $state4 = 'OFF';
					echo "<i>Status</i>: "."&#160 &#160<strong>Light</strong>: ".$state1."&#160 &#160 <strong>Fan</strong>: ".$state2."&#160 &#160 <strong>Motor</strong>: ".$state3."&#160 &#160  <strong>Water Heater</strong>: ".$state4;
				?>
				</div>
			
		
    </div>
  </body>
</html>
