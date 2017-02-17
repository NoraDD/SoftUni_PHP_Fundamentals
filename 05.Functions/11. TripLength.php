<?php
$coordinates = explode(", ", trim(fgets(STDIN)));

$x1 = floatval($coordinates[0]);
$y1 = floatval($coordinates[1]);
$x2 = floatval($coordinates[2]);
$y2 = floatval($coordinates[3]);
$x3 = floatval($coordinates[4]);
$y3 = floatval($coordinates[5]);

echo calculateDistance($x1, $y1, $x2, $y2, $x3, $y3);

function calculateDistance(float $x1, float $y1, float $x2, float $y2, float $x3, float $y3)
{
    $AB = sqrt(($x1 - $x2) * ($x1 - $x2) + ($y1 - $y2) * ($y1 - $y2));
    $BC = sqrt(($x2 - $x3) * ($x2 - $x3) + ($y2 - $y3) * ($y2 - $y3));
    $AC = sqrt(($x1 - $x3) * ($x1 - $x3) + ($y1 - $y3) * ($y1 - $y3));
    $max = max($AB, $BC, $AC);

    $print = "";
    if ($AC === $max) {
        $print = '1->2->3: ' . ($AB + $BC);
    } else if ($BC === $max) {
        $print = '2->1->3: ' . ($AB + $AC);

    } else if ($AB === $max) {
        $print = '1->3->2: ' . ($BC + $AC);
    }
    return $print;
}

