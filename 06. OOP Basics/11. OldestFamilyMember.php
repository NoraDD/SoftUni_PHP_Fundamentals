<?php

class Person5
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

class Family
{
    private $members = [];
    private $oldestMember;

    public function addMember(Person5 $member)
    {
        $this->members[] = $member;

        if ($this->oldestMember == null || $this->oldestMember->getAge() < $member->getAge()) {
            $this->oldestMember = $member;
        }
    }

    public function getOldestMember()
    {
        return $this->oldestMember;
    }
}

$inputNum = intval(trim(fgets(STDIN)));

$family = new Family();

for ($i = 0; $i < $inputNum; $i++) {

    $familyMembers = explode(" ", trim(fgets(STDIN)));
    $name = $familyMembers[0];
    $age = intval($familyMembers[1]);

    $member = new Person5($name, $age);

    $family->addMember($member);
}

$old = $family->getOldestMember();
echo $old->getName() . ' ' . $old->getAge();
