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
    $cols = system('tput cols') -1;
    $lines = system('tput lines') - 1;
    $cursPos = [0,0];
    system('clear');
    while (1) {
//        system('tput cup '.rand(0,$lines).' '.rand(0,$cols)); // 0.002109
        {
            $randLocation = [random_int(0, $cols), random_int(0, $lines)];
            if ($cursPos[0] > $randLocation[0]) {
                echo("\033[" . $cursPos[0] - $randLocation[0] . "D"); // left
            } else {
                echo("\033[" . $randLocation[0] - $cursPos[0] . "C"); // right
            }
            if ($cursPos[1] > $randLocation[1]) {
                echo("\033[" . $cursPos[1] - $randLocation[1] . "A"); // up
            } else {
                echo("\033[" . $randLocation[1] - $cursPos[1] . "B"); // down
            }
            $cursPos = $randLocation;
        } // 1.5974044799805E-5

        {
            $displayString = get_defined_constants()[$colArray[rand(0, count($colArray) - 1)]];
            echo($displayString . ' ');
        } // 0.000195
    }
}

// printf("\033[XA"); // Move up X lines;
// printf("\033[XB"); // Move down X lines;
// printf("\033[XC"); // Move right X column;
// printf("\033[XD"); // Move left X column;
// printf("\033[2J"); // Clear screen