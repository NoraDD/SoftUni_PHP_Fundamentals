<?php

interface ICall
{
    public function setCall(string $number):string;
}

interface IBrowse
{
    public function setBrowsing(string $site):string;
}

class Smartphone implements ICall, IBrowse
{
    public function setCall(string $number):string
    {
        if (!is_numeric($number)) {
            throw new Exception("Invalid number!");
        }
        return "Calling... " . $number;
    }

    public function setBrowsing(string $site):string
    {
        if (preg_match('/[0-9]/', $site)) {
            throw new Exception("Invalid URL!");
        }
        return "Browsing: " . $site . "!";
    }
}

$phoneNumbers = trim(fgets(STDIN));
$phoneNumbers = explode(" ", $phoneNumbers);

$sites = trim(fgets(STDIN));
$sites = explode(" ", $sites);

$smartphone = new Smartphone();

foreach ($phoneNumbers as $phoneNumber) {
    try {
        echo $smartphone->setCall($phoneNumber) . PHP_EOL;
    } catch (Exception $exception) {
        echo $exception->getMessage() . PHP_EOL;
    }
}

foreach ($sites as $site) {
    try {
        echo $smartphone->setBrowsing($site) . PHP_EOL;
    } catch (Exception $exception) {
        echo $exception->getMessage() . PHP_EOL;
    }
}
