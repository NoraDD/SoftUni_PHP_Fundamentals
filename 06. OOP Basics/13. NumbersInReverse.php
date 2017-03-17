<?php

class DecimalNumber
{
    private $number;

    public function __construct(string $number)
    {
        $this->number = $number;
    }

    public function reversedOrderNum():string
    {
        $revStrNum = strrev($this->number);
        return $revStrNum;
    }
}
$inputNum = trim(fgets(STDIN));
$number = new DecimalNumber($inputNum);
echo $number->reversedOrderNum();