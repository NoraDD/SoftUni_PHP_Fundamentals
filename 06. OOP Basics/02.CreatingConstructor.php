<?php

class Person2
{
    public $name;
    public $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
        echo $this->name . " " . $this->age;
    }
}

$name = trim(fgets(STDIN));
$age = intval(trim(fgets(STDIN)));
$person = new Person2($name, $age);