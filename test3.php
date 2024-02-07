<?php

include_once 'vendor/autoload.php';

$screenInfo = eval(shell_exec('dist/getScreenInfo'));

var_dump($screenInfo);

//$stream = mmap_open('/dev/fb0', $screenInfo['screensizeBytes'], 0);
//$newScreenContent = '';
//
//while (1) {
//
//}
//fwrite($stream, )