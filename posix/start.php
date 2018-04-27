<?php

$pid = posix_getpid();
echo "pid:{$pid}\n";
file_put_contents('php.pid',$pid);
while(true){
	echo "pid:{$pid}          ".date('Y-m-d H:i:s')."\n";
	sleep(1);
	echo "sleep 1 s\n";
}
