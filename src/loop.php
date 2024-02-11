<?php


function mainLoop()
{
    $defaultCharset = json_decode(file_get_contents('src/charsets/default'), true);
    $colArray = [
        "TERM_BACK_WHITE_DARK",
        "TERM_BACK_YELLOW_DARK",
        "TERM_BACK_GREEN_DARK",
        "TERM_BACK_CYAN_DARK",
        "TERM_BACK_BLUE_DARK",
        "TERM_BACK_PURPLE_DARK",
        "TERM_BACK_RED_DARK",
        "TERM_BACK_RED_LIGHT",
        "TERM_BACK_GREEN_LIGHT",
        "TERM_BACK_YELLOW_LIGHT",
        "TERM_BACK_BLUE_LIGHT",
        "TERM_BACK_PURPLE_LIGHT",
        "TERM_BACK_CYAN_LIGHT",
        "TERM_BACK_WHITE_LIGHT",
    ];
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
        drawMap('main', $defaultCharset);
        $frames += 1;
        if (microtime(true) > $start + 1) {
            $start = microtime(true);
            $fps = $frames;
            $frames = 0;
        }
        echo($fps.PHP_EOL);
        echo "\033[1;1H";
//        sleep(1);
    }
}

function drawMap(string $map, array $charset)
{
    $map = trim(file_get_contents("src/maps/$map"));
    foreach (explode("\n", $map) as $line) {
        foreach (str_split(trim($line)) as $char) {
            $echoStr = '';
            foreach ($charset[$char]['col'] as $col) {
                $echoStr .= get_defined_constants()[$col];
            }
            echo($echoStr . $charset[$char]['char'] . TERM_RESET);
        }
        echo ("\n");
    }
}