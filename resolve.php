<?php

$t = file_get_contents($argv[1]);
foreach(explode(PHP_EOL, $t) as $line) {
	if (preg_match('/(\s+[\W\w]+\s\s+)(.+)$/', $line, $m)) {
		echo $m[1] . eval('return '.$m[2].';');
	} else {
		echo $line;
	}
	echo PHP_EOL;
}
