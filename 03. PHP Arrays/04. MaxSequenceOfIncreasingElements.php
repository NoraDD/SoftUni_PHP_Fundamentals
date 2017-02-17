<?php
$numbers = explode(' ', trim(fgets(STDIN)));

$longestSeq = 0;
$counter = 1;
$endIndex = 0;

for ($index = 0; $index < count($numbers) - 1; $index++) {
    if ($numbers[$index] < $numbers[$index + 1]) {
        $counter++;
    } else {
        $counter = 1;
    }

    if ($counter > $longestSeq) {
        $longestSeq = $counter;
        $endIndex = $index + 2;
    }
}

for ($i = $endIndex - $longestSeq; $i < $endIndex; $i++) {
    echo $numbers[$i] . ' ';
}