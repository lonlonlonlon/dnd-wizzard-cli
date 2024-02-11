<?php


function mainLoop()
{
    $defaultCharset = json_decode(file_get_contents('src/charsets/default'), true);
    $mapMain = loadMap("src/maps/main");
//    $cols = system('tput cols');
//    $lines = system('tput lines');
    $cols = 128;
    $lines = 37;
    $start = microtime(true);
    $fps = 0;
    $frames = 0;
    system('clear');
    while (1) { // 128 cols       37 lines
//        $randLocation = [random_int(0, $cols), random_int(0, $lines)];
//        $displayString = "\033[$randLocation[1];$randLocation[0]H".get_defined_constants()[$colArray[rand(0, count($colArray) - 1)]];
//        echo($displayString . ' ');
        drawMap($mapMain, $defaultCharset);
        $frames += 1;
        if (microtime(true) > $start + 1) {
            $start = microtime(true);
            $fps = $frames;
            $frames = 0;
        }
        echo("\033[20;20H" . $fps);
        echo "\033[1;1H";
//        usleep(1000000);
    }
}

function loadMap(string $path)
{
    $map = trim(file_get_contents($path));
    $lines = explode(PHP_EOL, $map);
    foreach ($lines as &$line) {
        $line = str_split($line);
    }
    return $lines;
}

function drawMap(array $map, array $charset)
{
    $echoStr = '';
    $lastLine = count($map) -1;
    foreach ($map as $i => $line) {
        foreach ($line as $char) {
            if (empty($charset[$char]['col'])) {
                $echoStr .= TERM_RESET;
            }
            foreach ($charset[$char]['col'] as $col) {
                $echoStr .= COLOR_DEFS[$col];
            }
            $echoStr .= $charset[$char]['char'];
        }
        if ($i !== $lastLine) {
            $echoStr .= PHP_EOL;
        }
    }
    echo($echoStr);
}