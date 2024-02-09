<?php

foreach (glob("src/*.php") as $srcFile) {
    include_once $srcFile;
}

$ttyprops = trim(`stty -g`);
$_ENV['ttyprops'] = $ttyprops;
system('stty -icanon -echo');

function shutdown(){
//    echo "\033c";
    system("stty '".$_ENV["ttyprops"]."'");
    if (!empty($_ENV["debug"])) {
        var_dump($_ENV["debug"]);
    }
    echo "Interrupted".PHP_EOL;
    exit;
}

register_shutdown_function("shutdown");
pcntl_async_signals(true);
pcntl_signal(SIGINT,"shutdown");

mainLoop();