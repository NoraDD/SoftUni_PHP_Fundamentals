<?php

interface IPerson
{
    public function getName():string;

    public function getAge():int;
}

class Citizen implements IPerson
{
    private $name;
    private $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    //Getters
    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }
}

$name = trim(fgets(STDIN));
$age = trim(fgets(STDIN));

$person = new Citizen($name, $age);

echo $person->getName() . PHP_EOL . $person->getAge();