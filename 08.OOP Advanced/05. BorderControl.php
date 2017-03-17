<?php

class Robot
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

class Citizen2
{
    private $name;
    private $age;
    private $id;

    public function __construct(string $name, int $age, $id)
    {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
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
}

$input = trim(fgets(STDIN));

$entries = [];

while ($input != "End") {
    $tokens = explode(" ", $input);

    if (count($tokens) == 3) {
        $name = $tokens[0];
        $age = intval($tokens[1]);
        $id = $tokens[2];

        $citizen = new Citizen2($name, $age, $id);

        $entries[] = $citizen;
    }

    if (count($tokens) == 2) {
        $model = $tokens[0];
        $id = $tokens[1];

        $robot = new Robot($model, $id);

        $entries[] = $robot;
    }
    $input = trim(fgets(STDIN));
}

$inputNum = trim(fgets(STDIN));

foreach ($entries as $onePerson) {
    if ($inputNum == substr($onePerson->getId(), -strlen($inputNum))) {
        echo $onePerson->getId() . PHP_EOL;
    }
}