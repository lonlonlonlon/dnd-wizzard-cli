<?php
$ttyprops = trim(`stty -g`);
$_ENV['ttyprops'] = $ttyprops;
system('stty -icanon -echo');

function shutdown(){
    echo "\033c";                                        // Clear terminal
    system("stty '".$_ENV["ttyprops"]."'");
    echo "Interrupted".PHP_EOL;
    exit;                                                // Clean quit
}

register_shutdown_function("shutdown");
declare(ticks = 1);
pcntl_signal(SIGINT,"shutdown");

$mouse = fopen('/dev/input/mice', 'r');

while (1) {
    $in = fread($mouse, 24);
    $in = bin2hex($in);
//    echo(bin2hex($in).PHP_EOL);
    $type = substr($in, 16, 2);
    $code = substr($in, 18, 2);
    $value = substr($in, 20, 4);
    echo("type: $type\tcode: $code\tvalue: $value\n");
}