<?php
declare(strict_types = 1);

$inputStr = trim(fgets(STDIN));
$inputArr = explode(", ", $inputStr);
$Nums = array_map("floatval", $inputArr); // $Nums = array_map("floatval", explode(", ", trim(fgets(STDIN))));

$inputNum = count($Nums);
for ($i = 0; $i < $inputNum; $i += 3) {
    $x = $Nums{$i};
    $y = $Nums{$i + 1};
    $z = $Nums{$i + 2};

    if (isVolume($x, $y, $z)) {
        echo "inside" . "\n";
    } else {
        echo "outside" . "\n";
    }
}

function isVolume(float $x, float $y, float $z): bool
{
    $x1 = 10;
    $x2 = 50;
    $y1 = 20;
    $y2 = 80;
    $z1 = 15;
    $z2 = 50;

    if ($x >= $x1 && $x <= $x2) {
        if ($y >= $y1 && $y <= $y2) {
            if ($z >= $z1 && $z <= $z2) {
                return true;
            }
        }
    }
    return false;
}