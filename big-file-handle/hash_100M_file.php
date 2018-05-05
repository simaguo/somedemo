<?php

	ini_set('memory_limit', '1M');
	
	$file = '100M_file.txt';
	$handle = fopen($file,'r');
	
	$hash_num =512;
	
	while(($buffer = fgets($handle,12))!==false){
		
		$num = compute_str_value($buffer);
		$hash = $num%$hash_num;
		$handle_name = 'handle_'.$hash;
		if(!isset($$handle_name)){
			$$handle_name = fopen('./son/'.$hash.'_'.$file,'w');
		}
		fwrite($$handle_name,$buffer);
	}
	
	for($i=0;$i<$hash_num;$i++){
		$handle_name = 'handle_'.$i;
		if(isset($$handle_name)){
			fclose($$handle_name);
			echo "fclose {$$handle_name} \n";
		}
	}
	
	$memory_used = memory_get_peak_usage(false);
	$real_memory_used = memory_get_peak_usage(true);
	print_r([
		'memory_used'=>($memory_used/1024/1024).'M',
		'real_memory_used'=>($real_memory_used/1024/1024).'M'
	]);
	
	function compute_str_value($str){
		if(is_numeric($str)) return intval($str);
		if(0==strlen($str)) return 0;
		
		$value = 0;
		$arr = str_split(strrev($str));
		foreach($arr as $index=>$char){
			$value += ord($char);
		}
		return $value;
	}
