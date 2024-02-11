<?php


function mainLoop_old()
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
    $cursPos = [0, 0];
    $c=0;
    system('clear');
    while (1) {
        $randLocation = [random_int(0, $cols), random_int(0, $lines)];
//        echo("cursCol: $cursPos[0] cursLine: $cursPos[1]\n");
//        echo("randCol: $randLocation[0] randLine: $randLocation[1]\n");
        if ($cursPos[0] > $randLocation[0]) {
            echo("\033[" . $cursPos[0] - $randLocation[0] . "D"); // left
//            echo("move " . $cursPos[0] - $randLocation[0] . " left\n"); // left
        } else {
            echo("\033[" . $randLocation[0] - $cursPos[0] . "C"); // right
//            echo("move " . $randLocation[0] - $cursPos[0] . " right\n"); // right
        }
        if ($cursPos[1] > $randLocation[1]) {
            echo("\033[" . $cursPos[1] - $randLocation[1] . "A"); // up
//            echo("move " . $cursPos[1] - $randLocation[1] . " up\n"); // up
        } else {
            echo("\033[" . $randLocation[1] - $cursPos[1] . "B"); // down
//            echo("move " . $randLocation[1] - $cursPos[1] . " down\n"); // down
        }
        if ($c > 10) {
            exit();
        }
        if ($randLocation[0] = $cols) {
            $cursPos[0] = 0;
            $cursPos[1] += 1;
        } else {
            $cursPos[0] = $randLocation[0] + 1;
            $cursPos[1] = $randLocation[1];
        }

        $displayString = get_defined_constants()[$colArray[rand(0, count($colArray) - 1)]];
        echo($displayString . ' ');
        $c++;
        sleep(1);
    }
//    while (1) {
//        $color = get_defined_constants()[$colArray[rand(0, count($colArray) - 1)]];
//        echo($color);
//        for ($n = 0; $n < $cols; $n++) {
//            echo ' ';
//        }
//    }
}

// printf("\033[XA"); // Move up X lines;
// printf("\033[XB"); // Move down X lines;
// printf("\033[XC"); // Move right X column;
// printf("\033[XD"); // Move left X column;
// printf("\033[2J"); // Clear screen