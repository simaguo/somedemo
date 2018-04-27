<?php

posix_kill(file_get_contents('php.pid'),SIGKILL);
