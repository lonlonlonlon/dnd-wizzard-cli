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
$term = fopen('/dev/tty', 'w');
while (1) {
    fwrite($term, "\033[6n");


    $buf = fread(STDIN, 16);



    $matches = [];
    preg_match('/^\033\[(\d+);(\d+)R$/', $buf, $matches);

    $row = intval($matches[1]);
    $col = intval($matches[2]);
//    echo "Row: $row, Col: $col\n";
    usleep(100);
}