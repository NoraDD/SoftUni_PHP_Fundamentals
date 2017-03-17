<?php

class Person3
{
    private $name;
    private $age;

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

$countLines = trim(fgets(STDIN));
$personalInfoOutput = [];

for ($i = 0; $i < $countLines; $i++) {

    $personalInfoInput = explode(" ", trim(fgets(STDIN)));
    $name = $personalInfoInput[0];
    $age = intval($personalInfoInput[1]);

    if ($age > 30) {
        $person = new Person3($name, $age);
        $personalInfoOutput[] = $person; //array_push($personalInfoOutput, $person);
    }
}

function sortNames($a, $b)
{
    return strcmp($a->getName(), $b->getName());
}

usort($personalInfoOutput, "sortNames");

for ($i = 0; $i < count($personalInfoOutput); $i++) {
    if ($i != count($personalInfoOutput) - 1) {
        echo $personalInfoOutput[$i]->getName() . " - " . $personalInfoOutput[$i]->getAge() . "\n";
    } else {
        echo $personalInfoOutput[$i]->getName() . " - " . $personalInfoOutput[$i]->getAge();
    }
}

//foreach ($personalInfoOutput as $person) {
//    echo $person->getName() . ' - ' . $person->getAge() . "\n";
//}


