<?php
$input = array("hello", 15, 1.234, array(1, 2, 3), (object)[2.34]);

foreach ($input as $element) {
    if (is_numeric($element)) {
        var_dump($element);
    } else {
        echo gettype($element), "\n";
    }
}
