<?php

class Human
{
    private $firstName;
    private $lastName;

    public function __construct(string $firstName, string $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    //Getters
    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    //Setters
    protected function setFirstName(string $firstName)
    {
        if (!ctype_upper($firstName[0])) {
            throw new Exception("Expected upper case letter!Argument: firstName");
        }
        if (strlen($firstName) < 4) {
            throw new Exception("Expected length at least 4 symbols!Argument: firstName");
        }
        $this->firstName = $firstName;
    }

    protected function setLastName(string $lastName)
    {
        if (!ctype_upper($lastName[0])) {
            throw new Exception("Expected upper case letter!Argument: lastName");
        }
        if (strlen($lastName) < 3) {
            throw new Exception("Expected length at least 3 symbols!Argument: lastName");
        }
        $this->lastName = $lastName;
    }

    public function __toString()
    {
        return "First Name: " . $this->getFirstName() . PHP_EOL . "Last Name: " . $this->getLastName() . PHP_EOL;
    }
}

class Student extends Human
{
    private $facultyNumber;

    public function __construct($firstName, $lastName, $facultyNumber)
    {
        parent::__construct($firstName, $lastName);
        $this->setFacultyNumber($facultyNumber);
    }

    //Getters
    public function getFacultyNumber()
    {
        return $this->facultyNumber;
    }

    //Setters
    protected function setFacultyNumber(string $facultyNumber)
    {
        if (strlen($facultyNumber) < 5 || strlen($facultyNumber) > 10) {
            throw new Exception("Invalid faculty number!");
        }

        $this->facultyNumber = $facultyNumber;
    }

    public function __toString()
    {
        return parent::__toString() . "Faculty number: " . $this->getFacultyNumber() . PHP_EOL;
    }
}

class Worker extends Human
{
    private $weekSalary;
    private $workHoursPerDay;
    private $salaryPerHour;

    public function __construct($firstName, $lastName, $weekSalary, $workHoursPerDay)
    {
        parent::__construct($firstName, $lastName);
        $this->setWeekSalary($weekSalary);
        $this->setWorkHoursPerDay($workHoursPerDay);
        $this->setSalaryPerHour();
    }

    //Getters

    public function getWeekSalary()
    {
        return number_format($this->weekSalary, 2, '.', '');
    }

    public function getWorkHoursPerDay()
    {
        return number_format($this->workHoursPerDay, 2, '.', '');
    }

    public function getSalaryPerHour()
    {
        return number_format($this->salaryPerHour, 2, '.', '');
    }

    //Setters
    protected function setLastName(string $lastName)
    {
        if (strlen($lastName) <= 3) {
            throw new Exception("Expected length more than 3 symbols!Argument: lastName");
        }
        parent::setLastName($lastName);
    }

    protected function setWeekSalary($weekSalary)
    {
        if ($weekSalary <= 10) {
            throw new Exception("Expected value mismatch!Argument: weekSalary");
        }
        $this->weekSalary = $weekSalary;
    }

    protected function setWorkHoursPerDay($workHoursPerDay)
    {
        if ($workHoursPerDay < 1 || $workHoursPerDay > 12) {
            throw new Exception("Expected value mismatch!Argument: workHoursPerDay");
        }
        $this->workHoursPerDay = $workHoursPerDay;
    }

    protected function setSalaryPerHour()
    {
        $this->salaryPerHour = $this->weekSalary / (7 * $this->workHoursPerDay);
    }


    public function __toString()
    {
        return parent::__toString() .
        "Week Salary: " . $this->getWeekSalary() .
        PHP_EOL . "Hours per day: " .
        $this->getWorkHoursPerDay() . PHP_EOL .
        "Salary per hour: " . $this->getSalaryPerHour() . PHP_EOL;
    }
}

try {
    $studentInfo = explode(" ", trim(fgets(STDIN)));
    $studentFirstName = $studentInfo[0];
    $studentLastName = $studentInfo[1];
    $facultyNumber = $studentInfo[2];

    $newStudent = new Student($studentFirstName, $studentLastName, $facultyNumber);

    $workerInfo = explode(" ", trim(fgets(STDIN)));
    $workerFirstName = $workerInfo[0];
    $workerLastName = $workerInfo[1];
    $workingSalary = floatval($workerInfo[2]);
    $workingHours = floatval($workerInfo[3]);

    $newWorker = new Worker($workerFirstName, $workerLastName, $workingSalary, $workingHours);

    echo $newStudent . PHP_EOL . $newWorker;
} catch (Exception $exception) {
    echo $exception->getMessage();
}
