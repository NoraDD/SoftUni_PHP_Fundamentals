<?php
$today = getdate();
$newYear = mktime(0, 0, 0, 1, 1, $today['year'] + 1);
$diff = $newYear - $today[0];

if (date("I", $today[0]) > 0) {
    $diff -= 60 * 60;
}
echo "Hours until new year : " . round($diff/(60*60)) . "<br>";
echo "Minutes until new year : " . round($diff/60) . "<br>";
echo  "Seconds until new year : " . round($diff) . "<br>";
echo "Days:Hours:Minutes:Seconds " . round($diff / (60*60*24)) . ":" . date("H:i:s", $today[0]);