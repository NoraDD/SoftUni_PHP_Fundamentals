<?php
$arrayOfNums = explode(" ", trim(fgets(STDIN)));

$totalSum = 0;
foreach ($arrayOfNums as $value) {
    $value = strrev($value);
    $totalSum += (int)$value;
}
print_r($totalSum);