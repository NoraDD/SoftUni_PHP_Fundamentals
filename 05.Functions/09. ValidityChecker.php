<?php
$coordinates = explode(", ", trim(fgets(STDIN)));

$x1 = floatval($coordinates[0]);
$y1 = floatval($coordinates[1]);
$x2 = floatval($coordinates[2]);
$y2 = floatval($coordinates[3]);

function checkDistance($x1, $y1, $x2, $y2)
{
    $distanceX1Y1X2Y2 = sqrt(pow(($x2 - $x1), 2) + pow(($y2 - $y1), 2));

    if ($distanceX1Y1X2Y2 == round($distanceX1Y1X2Y2)) {
        return "{{$x1}}, {{$y1}} to {{$x2}}, {{$y2}} is valid\n";
    } else {
        return "{{$x1}}, {{$y1}} to {{$x2}}, {{$y2}} is invalid\n";
    }
}

echo checkDistance($x1, $y1, 0, 0);
echo checkDistance($x2, $y2, 0, 0);
echo checkDistance($x1, $y1, $x2, $y2);