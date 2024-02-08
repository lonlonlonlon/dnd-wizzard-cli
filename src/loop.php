<?php


function mainLoop () {
    $cols = shell_exec('tput cols') - 1;
    $rows = shell_exec('tput lines') - 1;
    while (1) {
        $displayString = TERM_BACK_PURPLE_DARK;
        for ($x = 0; $x < $cols; $x++) {
            for ($y = 0; $y < $cols; $y++) {
                $displayString .= ' ';
            }
            $displayString .= [TERM_BACK_CYAN_LIGHT, TERM_BACK_GREEN_LIGHT, TERM_BACK_YELLOW_LIGHT][rand(0,2)].PHP_EOL;
        }
        system('clear');
        echo($displayString);
        sleep(1);
    }
}