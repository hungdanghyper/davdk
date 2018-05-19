

<?php
	//xu li 
	
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$now = getdate(); 
	
    $time = $now["hours"] . ":" . $now["minutes"] . ":" . $now["seconds"] .  "  - " .  $now["mday"] . "/" . $now["mon"] . "/" . $now["year"] ; 
	//$timeXL = $now["year"].$now["mon"].$now["mday"].$now["hours"].$now["minutes"];
	
	//xu li ngay thang gio phut theo chuan 2 so, neu la 1 so thi them 0 vao o truoc
	$temp=$now["year"];
    if(strlen($now["mon"])==1) $temp=$temp."0".$now["mon"];
	else $temp=$temp.$now["mon"];
	if(strlen($now["mday"])==1) $temp=$temp."0".$now["mday"];
	else $temp=$temp.$now["mday"];
	if(strlen($now["hours"])==1) $temp=$temp."0".$now["hours"];
	else $temp=$temp.$now["hours"];
	if(strlen($now["minutes"])==1) $temp=$temp."0".$now["minutes"];
	else $temp=$temp.$now["minutes"];
	
	$timeXL=$temp;
	
	$filetemp = fopen("time.json", "w") or die("can't open file");
	fwrite($filetemp, "$time");
	fclose($filetemp); 
	
	echo $time;
	echo $timeXL;
	echo "<br>Thoi gian: <input type='text' name='Thoi gian' value=$time >";	
	
	//xu li time
	$rf= fopen("timeData.json","r") or die ("can't open file");  //doc file json timeData
	$data = fread($rf,filesize('timeData.json'));                //neu loi thi 17x20=340
	fclose($rf);
	
	//phan tach chuoi duoc phan cach boi day ,
	$arr = explode(",",$data);
	for($i=0;$i<count($arr);$i++){
		$keyTime = substr($arr[$i],0,12); //thoi gian hen gio, nam thang ngay gio phut
		$keyName = substr($arr[$i],14,1);//so hieu thiet bi
		$keyValue= substr($arr[$i],15,1);//trang thai bat tat 
		echo "</br>";
		echo $keyTime;
		echo "</br>";
		echo $timeXL;
		echo "</br>";
		echo $keyName;
		echo "</br>";
		echo $keyValue;
		echo "</br>";
		
		if($keyTime<=$timeXL&&$keyTime>"00000"){  //keytime la thoi gian hen gio lay tu file, timeXL lay thoi gian hien tai
			echo "</br>"."query success";
			$rft = fopen("device.json", "r") or die("can't open file");
			$dataj = fread($rft,41);
			fclose($rft);
			//xoa du lieu ve lai 0000 0000 0000 0000
			$arr[$i]="0000000000000000";
			$datasave = implode(",",$arr);  //noi array lai thanh mot chuoi
			
			echo "OK";
			echo $dataj;
			if($keyName=="1"){
				echo "D01";
				$file1 = fopen("device.json", "w") or die("can't open file");
				if($keyValue=="1"){
					$dataj[8]='1';
					fwrite($file1, $dataj);
				}else{
					$dataj[8]='0';
					fwrite($file1, $dataj);
				}
				fclose($file1);
				$wf= fopen("timeData.json","w") or die ("can't open file");  //doc file json timeData
				fwrite($wf,$datasave);  //luu file
				fclose($wf);
			}
			if($keyName=="2"){
				echo "D02";
				$file2 = fopen("device.json", "w") or die("can't open file");
				if($keyValue=="1"){
					$dataj[18]='1';
					fwrite($file2, $dataj);
				}else{
					$dataj[18]='0';
					fwrite($file2, $dataj);
				}
				fclose($file2);
				$wf= fopen("timeData.json","w") or die ("can't open file");  
				fwrite($wf,$datasave);  //luu file
				fclose($wf);
			}
			if($keyName=="3"){
				echo "D03";
				$file3 = fopen("device.json", "w") or die("can't open file");
				if($keyValue=="1"){
					$dataj[28]='1';
					fwrite($file3, $dataj);
				}else{
					$dataj[28]='0';
					fwrite($file3, $dataj);
				}
				fclose($file3);
				$wf= fopen("timeData.json","w") or die ("can't open file");  //mo file json timeData de ghi
				fwrite($wf,$datasave);  //luu file
				fclose($wf);
			}
			if($keyName=="4"){
				echo "D04";
				$file4 = fopen("device.json", "w") or die("can't open file");
				if($keyValue=="1"){
					$dataj[38]='1';
					fwrite($file4, $dataj);
				}else{
					$dataj[38]='0';
					fwrite($file4, $dataj);
				}
				fclose($file4);
				$wf= fopen("timeData.json","w") or die ("can't open file");  
				fwrite($wf,$datasave);  //luu file
				fclose($wf);
			}
			
		}
		
		
		echo $datasave;
		
	}	
		
?>
<!--
nam thang ngay gio phut giay

2016 02 28 02 02 02
2016 03 01 02 02 02
2016 03 01 02 02 01
-->
