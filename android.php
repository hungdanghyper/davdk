<?php
$D1 = $_POST['D01'];  
$D2 = $_POST['D02'];
$D3 = $_POST['D03'];
$D4 = $_POST['D04'];
$stateAll=$_POST['stateAll'];

//giai ma
$D1=base64_decode($D1);
$length=strlen($D1)-5;
$D1=substr($D1,5,$length);
$D1=base64_decode($D1);

$D2=base64_decode($D2);
$length=strlen($D2)-5;
$D2=substr($D2,5,$length);
$D2=base64_decode($D2);

$D3=base64_decode($D3);
$length=strlen($D3)-5;
$D3=substr($D3,5,$length);
$D3=base64_decode($D3);

$D4=base64_decode($D4);
$length=strlen($D4)-5;
$D4=substr($D4,5,$length);
$D4=base64_decode($D4);

$stateAll=base64_decode($stateAll);
$length=strlen($stateAll)-5;
$stateAll=substr($stateAll,5,$length);
$stateAll=base64_decode($stateAll);

$rf = fopen("device.json", "r") or die("can't open file");
$data = fread($rf,filesize('device.json'));
fclose($rf);
 
if($D1 == "1") { 
  $file = fopen("device.json", "w") or die("can't open file");
  if($data == ""){ 
 	fwrite($file, '{"D01":"1","D02":"0","D03":"0","D04":"0"}'); 
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
}else if ($stateAll == "OffAll") {  
    $file = fopen("device.json", "w") or die("can't open file"); 
 	fwrite($file, '{"D01":"0","D02":"0","D03":"0","D04":"0"}');
	fclose($file);
}else if ($stateAll == "OnAll") {  
    $file = fopen("device.json", "w") or die("can't open file"); 
 	fwrite($file, '{"D01":"1","D02":"1","D03":"1","D04":"1"}');
	fclose($file);
}
?>
