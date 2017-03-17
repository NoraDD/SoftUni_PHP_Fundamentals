<?php

class DateModifier
{
    private $difference;

    public function getDifferenceBetweenTwoDates(string $firstDate, string $secondDate): string
    {
        $date1 = new DateTime($firstDate);
        $date2 = new DateTime($secondDate);
        $this->difference = $date2->diff($date1)->format("%a");

        return $this->difference;
    }
}

$firstDate = trim(fgets(STDIN));
$secondDate = trim(fgets(STDIN));
$firstDate = str_replace(" ","-", $firstDate);
$secondDate = str_replace(" ","-", $secondDate);
$date = new DateModifier();
echo $date->getDifferenceBetweenTwoDates($firstDate, $secondDate);