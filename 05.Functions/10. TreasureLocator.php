<?php
$coordinates = explode(", ", trim(fgets(STDIN)));

$countCoordinates = count($coordinates);

for ($i = 0; $i < $countCoordinates; $i += 2) {
    $x = $coordinates[$i];
    $y = $coordinates[$i + 1];

    $location = getLocation($x, $y);

    echo $location . "\n";
}
function getLocation($x, $y){
    if ($x >= 1 && $x <= 3 && $y >= 1 && $y <= 3) return "Tuvalu";
    if ($x >= 8 && $x <= 9 && $y >= 0 && $y <= 1) return "Tokelau";
    if ($x >= 5 && $x <= 7 && $y >= 3 && $y <= 6) return "Samoa";
    if ($x >= 0 && $x <= 2 && $y >= 6 && $y <= 8) return "Tonga";
    if ($x >= 4 && $x <= 9 && $y >= 7 && $y <= 8) return "Cook";
    else return "On the bottom of the ocean";
}
