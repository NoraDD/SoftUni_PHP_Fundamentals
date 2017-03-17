<?php

class Student
{
    private $firstName;
    private $lastName;
    private $email;
    private $examScore;

    public function __construct(string $firstName, string $lastName, string $email, int $examScore)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->examScore = $examScore;
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

    public function getEmail()
    {
        return $this->email;
    }

    public function getExamScore()
    {
        return $this->examScore;
    }



}