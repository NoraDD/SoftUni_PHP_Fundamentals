<?php

class Robot2
{
    private $model;
    private $id;

    public function __construct($model, $id)
    {
        $this->model = $model;
        $this->id = $id;
    }

    //Getters
    public function getModel()
    {
        return $this->model;
    }

    public function getId()
    {
        return $this->id;
    }
}

class Citizen3
{
    private $name;
    private $age;
    private $id;
    private $birthdate;

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
}

class Pet
{
    private $name;
    private $birthdate;

    public function __construct(string $name, $birthdate)
    {
        $this->name = $name;
        $this->birthdate = $birthdate;
    }

    //Getters
    public function getName(): string
    {
        return $this->name;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }
}

$input = trim(fgets(STDIN));

$entries = [];

while ($input != "End") {
    $tokens = explode(" ", $input);

    if (count($tokens) == 5) {
        $name = $tokens[1];
        $age = intval($tokens[2]);
        $id = $tokens[3];
        $birthdate = $tokens[4];

        $citizen = new Citizen3($name, $age, $id, $birthdate);

        $entries[] = $citizen;
    } else if (count($tokens) == 3 && $tokens[0] = "Pet") {
        $name = $tokens[1];
        $birthdate = $tokens[2];

        $pet = new Pet($name, $birthdate);
        $entries[] = $pet;
    } else {
        $model = $tokens[1];
        $id = $tokens[2];

        $robot = new Robot2($model, $id);

        $entries[] = $robot;
    }
    $input = trim(fgets(STDIN));
}

$inputNum = trim(fgets(STDIN));

foreach ($entries as $onePerson) {
    if ($inputNum == substr($onePerson->getBirthdate(), -strlen($inputNum))) {
        echo $onePerson->getBirthdate() . PHP_EOL;
    }
}