<?php


function mainLoop()
{
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
    $cols = system('tput cols');
    $lines = system('tput lines') - 1;
    system('clear');
    while (1) {
        system('tput cup '.rand(0,$lines).' '.rand(0,$cols)); // 0.002109
        $start = microtime(true);
        {
            $displayString = get_defined_constants()[$colArray[rand(0, count($colArray) - 1)]];
            echo($displayString . ' ');
        } // 0.000195
        $end = microtime(true);
        echo $end - $start;
        exit();
    }
}