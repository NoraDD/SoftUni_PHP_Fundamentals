<?php
$array = explode(' ', trim(fgets(STDIN)));
$rotations = intval(fgets(STDIN));

$sumArray = [];
for ($currentRotation = 0; $currentRotation < $rotations; $currentRotation++){
    $lastElements = $array[count($array) - 1];
    for ($i = count($array) - 1; $i > 0; $i--){
        $array[$i] = $array[$i - 1];
    }
    $array[0] = $lastElements;
    for ($i = 0; $i < count($array); $i++){
        $sumArray[$i] += $array[$i];
    }
}
foreach ($sumArray as $key => $val) {
    echo "$val ";
}
