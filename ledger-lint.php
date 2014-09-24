<?php

$fileName = $argv[1];

$fh = fopen($fileName, 'r');

if ($fh) {
    $date = 0;
    $l = 0;
    while (($line = fgets($fh, 4096)) !== false) {
        $l++;
        if (trim($line)) {
            if (preg_match('/^([\d]+\/[\d]+\/[\d]+)/', $line, $matches)) {
                $cdate = strtotime($matches[1]);
                if ($cdate < $date) {
                    die('Line: ' . $l . ' ' . $matches[0] . PHP_EOL);
                }
                $date = $cdate;
            }
        }
    }
    if (!feof($fh)) {
        echo "Error: unexpected fgets() fail\n";
    }    
    fclose($fh);
} 

