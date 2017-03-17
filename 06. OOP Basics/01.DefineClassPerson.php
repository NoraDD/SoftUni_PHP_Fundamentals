<?php

class Person1
{
    public $name;
    public $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }
}
$person1 = new Person1('Pesho', 20);
//$person2 = new Person1('Gosho', 18);
//$person3 = new Person1('Stamat', 43);
//echo $person1->getName() . " " . $person1->getAge() . "<br>";
echo(count(get_object_vars($person1)));