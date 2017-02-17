<?php
$numbers = explode(' ', trim(fgets(STDIN)));

$longestSeq = 0;
$counter = 1;
$number = 0;

for ($i = 0; $i < count($numbers) - 1; $i++) {
    if ($numbers[$i] == $numbers[$i + 1]) {
        $counter++;
    } else {
        $counter = 1;
    }
    if ($counter > $longestSeq) {
        $longestSeq = $counter;
        $number = $numbers[$i];
    }
}

for ($i = 0; $i < $longestSeq; $i++) {
    echo $number . ' ';
}