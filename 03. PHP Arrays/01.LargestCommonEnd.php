<?php
$firstArray = explode(' ', fgets(STDIN));
$secondArray = explode(' ', fgets(STDIN));

$smallerArrayLength = min(count($firstArray), count($secondArray));
$biggerArrayLength = max(count($firstArray), count($secondArray));
$diff = $biggerArrayLength - $smallerArrayLength;

$leftCounter = 0;
$rightCounter = 0;

if (count($firstArray) > count($secondArray)) {
    $biggerArray = $firstArray;
    $smallerArray = $secondArray;
} else {
    $biggerArray = $secondArray;
    $smallerArray = $firstArray;
}

for ($i = 0; $i < $smallerArrayLength; ++$i) {
    if ($firstArray[$i] == $secondArray[$i]) {
        $leftCounter++;
    } else {
        break;
    }
}

for ($i = $biggerArrayLength; $i >= 0; --$i) {
    if ($i - 1 - $diff < 0) {
        break;
    } else if ($biggerArray[$i - 1] == $smallerArray[$i - 1 - $diff]) {
        $rightCounter++;
    } else {
        break;
    }
}

echo max($rightCounter, $leftCounter);
