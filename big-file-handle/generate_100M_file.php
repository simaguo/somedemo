<?php
	ini_set('memory_limit', '1M');
	function generateRandomStr($length){	
		$str = '';
		$char = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','1','2','3','4','5','6','7','8','9','0','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','~','!','@','#','$','%','^','&','*'];
		for($i=0;$i<$length;$i++){
			$index = mt_rand(0,70);
			$str .= $char[$index];
		}
		return $str;
	}
	/**
	for($j=0;$j<20000;$j++)
	{
		echo generateRandomStr(10)."\n";
	}
	*/
	
	$size = 1024*1024*100;
	
	$total = $generated_total = 0;
	
	$file = ($size/1024/1024).'M_file.txt';
	$handle = fopen($file,'w');
	while($total < $size){
		$str = mt_rand(1000,999999);
		fwrite($handle,$str."\n");
		
		$total += strlen($str)+1;
		
		if($total > $generated_total+(1024*1024)){
			$generated_total = $generated_total+(1024*1024);
			echo "已生成".($generated_total/1024/1024)."M\n";
		}
		
	}
	fclose($handle);
	
	$memory_used = memory_get_peak_usage(false);
	$real_memory_used = memory_get_peak_usage(true);
	print_r([
		'memory_used'=>($memory_used/1024/1024).'M',
		'real_memory_used'=>($real_memory_used/1024/1024).'M'
	]);
