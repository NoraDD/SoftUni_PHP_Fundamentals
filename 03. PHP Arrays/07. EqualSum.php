<?php
$numbers = explode(' ', fgets(STDIN));

$leftSum = 0;
$rightSum = 0;
$equalSum = false;

for ($i = 0; $i < count($numbers); $i++) {
    for ($j = 0; $j < $i; $j++) {
        $leftSum = $leftSum + $numbers[$j];
    }

    for ($k = $i + 1; $k < count($numbers); $k++) {
        $rightSum = $rightSum + $numbers[$k];
    }

    if ($leftSum == $rightSum) {
        echo $i;
        $equalSum = true;
    }

    $leftSum = 0;
    $rightSum = 0;
}

if (!$equalSum) {
    echo "no";
}