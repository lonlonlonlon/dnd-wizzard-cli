<?php


function mainLoop () {
    $cols = system('tput cols') - 1;
    $lines = system('tput lines') - 1;
    while (1) {
        $displayString = TERM_BACK_PURPLE_DARK;
        for ($x = 0; $x < $lines; $x++) {
            for ($y = 0; $y < $cols; $y++) {
                $displayString .= ' ';
            }
            $displayString .= [TERM_BACK_CYAN_LIGHT, TERM_BACK_GREEN_LIGHT, TERM_BACK_YELLOW_LIGHT][rand(0,2)].PHP_EOL;
            echo ($displayString);
            $displayString = '';
            usleep(10);
        }
        echo(TERM_RESET);
        system('clear');
    }
}