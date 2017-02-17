<?php
$firstArray = explode(" ", fgets(STDIN));
$secondArray = explode(" ", fgets(STDIN));

$firstCount = count($firstArray);
$secondCount = count($secondArray);
$smallerArrayLength = min(count($firstArray), count($secondArray));

$leftCounter = 0;
$rightCounter = 0;

for ($i = 0; $i < $smallerArrayLength; $i++) {
    if ($firstArray[$i] == $secondArray[$i]) {
        $leftCounter++;
    } else if ($firstArray[$firstCount - $i - 1] == $secondArray[$secondCount - $i - 1]) {
        $rightCounter++;
    } else {
        break;
    }
}
echo max($leftCounter, $rightCounter);
