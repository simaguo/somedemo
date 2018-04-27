<?php

//if($argc== 2 && is_numeric($argv[1])){

	//$stdin = $argv[1];
	$pid = file_get_contents('php.pid');
	echo $pid."\n";

	if(posix_kill($pid,SIGSTOP)){
		echo "STOP PID  $pid SUCCESS\n";
	}
//}
