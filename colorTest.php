<?php
foreach (glob("src/*.php") as $srcFile) {
    include_once $srcFile;
}
displayColorTest();