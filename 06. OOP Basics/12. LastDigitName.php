<?php

class Number
{
    private $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function getEnglishNameLastDigit(): string
    {
        $lastDigit = ($this->number) % 10;
        $EnglishNameLastDigit = "";

        switch ($lastDigit) {
            case "0": $EnglishNameLastDigit = "zero"; break;
            case "1": $EnglishNameLastDigit = "one"; break;
            case "2": $EnglishNameLastDigit = "two"; break;
            case "3": $EnglishNameLastDigit = "three"; break;
            case "4": $EnglishNameLastDigit = "four"; break;
            case "5": $EnglishNameLastDigit = "five"; break;
            case "6": $EnglishNameLastDigit = "six"; break;
            case "7": $EnglishNameLastDigit = "seven"; break;
            case "8": $EnglishNameLastDigit = "eight"; break;
            case "9": $EnglishNameLastDigit = "nine"; break;
        }
        return $EnglishNameLastDigit;
    }
}

$inputNum = intval(trim(fgets(STDIN)));
$number = new Number($inputNum);
echo $number->getEnglishNameLastDigit();