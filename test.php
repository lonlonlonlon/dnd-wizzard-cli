<?php

foreach (glob("src/*.php") as $srcFile) {
    include_once $srcFile;
}

while (1) {
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
    echo(get_defined_constants()[$colArray[rand(0, count($colArray) - 1)]]." \033[1D");
    
    sleep(1);
}
