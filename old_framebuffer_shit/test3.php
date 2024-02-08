<?php

include_once 'vendor/autoload.php';

$screenInfo = eval(shell_exec('dist/getScreenInfo'));

var_dump($screenInfo);

$stream = mmap_open('/dev/fb0', $screenInfo['screensizeBytes'], 0);
$newScreenContent = '';
$c = 0;
while (1) {
    $newScreenContent .= chr(rand(0,255));
    $newScreenContent .= chr(rand(0,255));
    $newScreenContent .= chr(rand(0,255));
    $newScreenContent .= chr(rand(0,255));
    echo $newScreenContent;
    fwrite($stream, $newScreenContent);
    $newScreenContent = '';
    rewind($stream);
//    if ($c == 100) {
//        fclose($stream);
//        exit();
//    }
    $c++;
}
