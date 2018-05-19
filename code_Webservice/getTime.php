<?php
	//ham xac dinh xem co phai du lieu nhan co dung 16 ki tu tieu chuan ko
	function isOkData($s){
		if(strlen($s)==16) return true;
		else return false;
	}	
	
	$timeDate = $_GET['sendData'];   //get lay gia tri tu app android gui len
	
    $rf = fopen("timeData.json", "r") or die("can't open file");
	$data = fread($rf,340);   		//lay du lieu trong file ra
	fclose($rf);
	
	//phan tach chuoi duoc phan cach boi day , : tach du lieu trong file ra tu tu mot
	$arr = explode(",",$data);
	
	if(isOkData($timeDate)==true){   //kiem tra xem con cho nao trong khong de chen vao
		for($i=0;$i<20;$i++){
			if($arr[$i]=="0000000000000000"){
				$arr[$i]=$timeDate;
				break;
			}
		}	
	}
	
	if($timeDate=="deleteAll"){
		for($i=0;$i<20;$i++){
			$arr[$i]=="0000000000000000";
		}	
	}
	
	sort($arr);
	
	//nối các string lại, phân cách bởi dấu ,
	$data=implode(",",$arr);
	
	$files = fopen("timeData.json", "w") or die("can't open file");
	fwrite($files, $data);
	fclose($files);
	
	echo $arr[4][12];
	print_r($arr);
	echo "<br/>";
	echo $data;
	echo "<br/>"."Length: ";
	echo strlen($timeDate);
	
?>


 
