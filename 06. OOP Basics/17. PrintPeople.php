<?php

class Person6
{
    private $name;
    private $age;
    private $occupation;

    public function __construct(string $name, int $age, string $occupation)
    {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    public function __toString()
    {
      return $this->name . " - " . "age: " . $this->age . ", occupation: " . $this->occupation . "\r\n";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getOccupation(): string
    {
        return $this->occupation;
    }
}

$command = explode(" ", trim(fgets(STDIN)));

$people = [];

while ($command[0] != "END") {
    $name = $command[0];
    $age = intval($command[1]);
    $occupation = $command[2];

    $person = new Person6($name, $age, $occupation);
    $people[] = $person;

    $command = explode(" ", trim(fgets(STDIN)));
}

 function sortByAge($a, $b) {
     return $a->getAge() > $b->getAge();
 }

 usort($people, "sortByAge");

foreach ($people as $person) {
    echo $person;
}
