<?php


interface IBuyer
{
    public function BuyFood():int;

    public function getFood():int;
}

class Rebel implements IBuyer
{
    private $name;
    private $age;
    private $group;
    private $food = 0;

    public function __construct(string $name, int $age, string $group)
    {
        $this->name = $name;
        $this->age = $age;
        $this->group = $group;
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

    public function getGroup(): string
    {
        return $this->group;
    }

    public function BuyFood():int
    {
        return $this->food += 5;
    }

    public function getFood(): int
    {
        return $this->food;
    }
}

class Citizen4 implements IBuyer
{
    private $name;
    private $age;
    private $id;
    private $birthdate;
    private $food = 0;

    public function __construct(string $name, int $age, $id, $birthdate)
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

    public function getId()
    {
        return $this->id;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function BuyFood():int
    {
        return $this->food += 10;
    }

    public function getFood(): int
    {
        return $this->food;
    }
}

$peopleBuyFood = [];

$numPeople = trim(fgets(STDIN));

for ($i = 0; $i < $numPeople; $i++) {
    $input = trim(fgets(STDIN));
    $tokens = explode(" ", $input);

    if (count($tokens) == 4) {
        $name = $tokens[0];
        $age = intval($tokens[1]);
        $id = $tokens[2];
        $birthdate = $tokens[3];

        $citizen = new Citizen4($name, $age, $id, $birthdate);
        $peopleBuyFood[$name] = $citizen;
    } else if (count($tokens) == 3) {
        $name = $tokens[0];
        $age = intval($tokens[1]);
        $group = $tokens[2];

        $rebel = new Rebel($name, $age, $group);
        $peopleBuyFood[$name] = $rebel;
    }
}

$nameToBeChecked = trim(fgets(STDIN));

while ($nameToBeChecked != "End") {

    if (array_key_exists($nameToBeChecked, $peopleBuyFood)) {
        $person = $peopleBuyFood[$nameToBeChecked];
        $person->BuyFood();
    }

    $nameToBeChecked = trim(fgets(STDIN));
}

$foodPurchased = 0;

foreach ($peopleBuyFood as $person) {
    $foodPurchased = $foodPurchased + $person->getFood();
}

echo $foodPurchased;


