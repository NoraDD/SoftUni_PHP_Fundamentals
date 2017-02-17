<?php
$numbers = explode(' ', trim(fgets(STDIN)));

$resultNumber = 0;
$counter = 0;

for ($i = 0; $i < count($numbers); $i++) {
    $tempCounter = 0;

    foreach ($numbers as $number){
        if ($numbers[$i] == $number) {
            $tempCounter++;
        }
    }
    if ($tempCounter > $counter) {
        $counter = $tempCounter;
        $resultNumber = $numbers[$i];
    }
}
echo $resultNumber . ' ';