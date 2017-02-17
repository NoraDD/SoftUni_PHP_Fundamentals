<?php
$numArray = explode(' ', trim(fgets(STDIN)));
$rotations = intval(fgets(STDIN));

$sum = [];

for ($r = 1; $r <= $rotations; $r++) {
    for ($i = 0; $i < count($numArray); $i++) {
        $sum[($r + $i) % count($numArray)] += $numArray[$i];
    }
}
ksort($sum);
foreach ($sum as $key => $val) {
    echo "$val ";
}

