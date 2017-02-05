<?php
$month = date('m');
$year = date('Y');
$numOfDays = date('t');

for($day = 1; $day <= $numOfDays; $day++){

    $curDayString = $day . '-' . $month . '-' . $year;
    $curDate = date("jS F, Y", strtotime($curDayString));

    if (date("l", strtotime($curDate)) == "Sunday"){
        echo $curDate . '<br>';
    }
}
