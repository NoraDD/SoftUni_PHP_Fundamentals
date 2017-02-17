<?php
declare(strict_types = 1);

$day = trim(fgets(STDIN));
echo getDayOfWeek($day);

function getDayOfWeek(string $dayName)
{
    if ($dayName == 'Monday') {
        return 1;
    } else if ($dayName == 'Tuesday') {
        return 2;
    } else if ($dayName == 'Wednesday') {
        return 3;
    } else if ($dayName == 'Thursday') {
        return 4;
    } else if ($dayName == 'Friday') {
        return 5;
    } else if ($dayName == 'Saturday') {
        return 6;
    } else if ($dayName == 'Sunday') {
        return 7;
    }
        return "error";
}