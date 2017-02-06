<?php
$numberOne = intval(fgets(STDIN));
$numberTwo = intval(fgets(STDIN));
$numberThree = intval(fgets(STDIN));

$largestFromOneTwo = $numberOne;

if ($numberTwo > $numberOne) {
    $largestFromOneTwo = $numberTwo;
}

if ($numberThree > $largestFromOneTwo) {
    echo "Max: " . $numberThree;
} else {
    echo "Max: " . $largestFromOneTwo;
}