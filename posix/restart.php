<?php

//if($argc == 2 && is_numeric($argv[1])){
	$pid = file_get_contents('php.pid');
	//$pid = $argv[1];
	if(posix_kill($pid,SIGCONT)){
		echo "RESTART PID $pid SUCCESS\n";
	}
//}
