<?php

interface IPerson
{
    public function getName():string;

    public function getAge():int;
}

interface IIdentifiable
{
    public function getId():string;
}

interface IBirthable
{
    public function getBirthdate():string;
}

class Citizen implements IPerson, IIdentifiable, IBirthable
{
    private $name;
    private $age;
    private $id;
    private $birthdate;

    public function __construct(string $name, int $age, string $id, string $birthdate)
    {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
        $this->birthdate = $birthdate;
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


    public function getId(): string
    {
        return $this->id;
    }

    public function getBirthdate(): string
    {
        return $this->birthdate;
    }
}

$name = trim(fgets(STDIN));
$age = trim(fgets(STDIN));
$id = trim(fgets(STDIN));
$birthdate = trim(fgets(STDIN));

$citizen = new Citizen($name, $age, $id, $birthdate);

echo $citizen->getName() . PHP_EOL . $citizen->getAge(). PHP_EOL . $citizen->getId() . PHP_EOL . $citizen->getBirthdate();