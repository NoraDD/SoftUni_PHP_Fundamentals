<?php
declare(strict_types = 1);

$curSpeed = intval(trim(fgets(STDIN)));
$zone = trim(fgets(STDIN));

$zoneLimit = getLimit($zone);
$infraction = getInfraction($curSpeed, $zoneLimit);

if ($infraction) {
    echo $infraction;
}

function getLimit(string $zone)
{
    switch ($zone) {
        case 'motorway':
            $speedLimit = 130;
            break;
        case 'interstate':
            $speedLimit = 90;
            break;
        case 'city':
            $speedLimit = 50;
            break;
        case 'residential':
            $speedLimit = 20;
            break;
        default:
            echo "Not a valid Input";
            $speedLimit = 1000;
    }
    return $speedLimit;
}

function getInfraction(int $curSpeed, int $limit)
{
    $overSpeed = $curSpeed - $limit;
    if ($overSpeed >= 0) {
        if ($overSpeed <= 20) {
            return "speeding";
        }
        if ($overSpeed <= 40) {
            return "excessive speeding";
        }
        return "reckless driving";
    }
    return false;
}