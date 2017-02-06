<?php
$letters = [];
$input = trim(fgets(STDIN));
foreach (str_split($input) as $letter) {
    if (!array_key_exists($letter, $letters)) {
        $letters[$letter] = 0;
    }
    $letters[$letter]++;
}

arsort($letters);

foreach ($letters as $letter => $timesAppeared) {
    echo "{$letter} -> {$timesAppeared} \n";
}