<?php
$number = trim(fgets(STDIN));

$average = getAverage($number);

while ($average < 5) {
    $number .= '9';
    $average = getAverage($number);
}
echo $number;

function getAverage($num){
    $sumOfDigits = 0;
    for ($i = 0; $i < strlen($num); $i++) {
        $sumOfDigits += $num[$i];
    }
    return $sumOfDigits / strlen($num);
}

