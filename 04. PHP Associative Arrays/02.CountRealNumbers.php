<?php
$numArr = explode(" ", trim(fgets(STDIN)));
$counts = [];

foreach ($numArr as $num) {
    if (!array_key_exists($num, $counts)) {
        $counts[$num] = 1;
    } else {
        $counts[$num]++;
    }
}
ksort($counts);
foreach ($counts as $key => $value) {
    echo $key . " -> " . $value . " times" . "\n";
}