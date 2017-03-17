<?php

class Employee
{
    private $name;
    private $salary;
    private $position;
    private $department;
    private $email;
    private $age;

    public function __construct(string $name, float $salary, string $position, string $department, string $email, int $age)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->position = $position;
        $this->department = $department;
        $this->email = $email;
        $this->age = $age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function getDepartment(): string
    {
        return $this->department;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getAge(): int
    {
        return $this->age;
    }
}

$countLines = trim(fgets(STDIN));

$employees = [];

for ($i = 0; $i < $countLines; $i++) {

    $employeeInfoInput = explode(" ", trim(fgets(STDIN)));
    $name = $employeeInfoInput[0];
    $salary = floatval($employeeInfoInput[1]);
    $position = $employeeInfoInput[2];
    $department = $employeeInfoInput[3];
    $email = "n/a";
    $age = intval(-1);

    if (isset($employeeInfoInput[4])) {
        if (is_numeric($employeeInfoInput[4])) {
            $age = intval($employeeInfoInput[4]);
        } else {
            $email = $employeeInfoInput[4];
        }
    }

    if (isset($employeeInfoInput[5])) {
        if (is_numeric($employeeInfoInput[5])) {
            $age = intval($employeeInfoInput[5]);
        }
    }

    $employee = new Employee($name, $salary, $position, $department, $email, $age);

    $employees[] = $employee;
}

$departments = [];

foreach ($employees as $employee){
    if (array_key_exists($employee->getDepartment(), $departments)){
        $departments[$employee->getDepartment()]++;
    } else {
        $departments[$employee->getDepartment()] = 1;
    }
}

$averageSalaries = [];

foreach ($departments as $department => $count){
    $averageSalary = 0;
    foreach ($employees as $employee){
        if($employee->getDepartment() == $department){
            $averageSalary += $employee->getSalary();
        }
    }
    $averageSalary /= $count;
    $averageSalaries[$department] = round($averageSalary, 2);
}

$highestSalary = max($averageSalaries);

$highestSalaryDepartment = array_search($highestSalary, $averageSalaries);

echo "Highest Average Salary: {$highestSalaryDepartment}\n";

function orderBySalary($a, $b){
    return $a->getSalary() < $b->getSalary();
}
usort($employees, 'orderBySalary');

foreach ($employees as $employee){
    if($employee->getDepartment() == $highestSalaryDepartment){
        echo $employee->getName() . ' ' .
            number_format($employee->getSalary(), 2) . ' ' .
            $employee->getEmail() . ' ' .
            $employee->getAge() . "\n";
    }
}
