<?php

include_once 'vendor/autoload.php';

$stream = mmap_open('/dev/fb0', 5120 * 1440 * 32 / 8, 0);

