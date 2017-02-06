<?php
$input = trim(fgets(STDIN));
$letters = [];
foreach (str_split($input) as $letter) {
    if (!array_key_exists($letter, $letters)) {
        $letters[$letter] = 0;
    }
    $letters[$letter]++;
}

foreach ($letters as $letter => $timesAppeared) {
    echo "{$letter} -> {$timesAppeared} \n";
}