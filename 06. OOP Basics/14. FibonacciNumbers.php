<?php

class Fibonacci
{
    private $fibonacciNumbers = [0, 1];

    public function getNumbersInRange(int $startPosition, int $endPosition)
    {
        for ($i = 2; $i < $endPosition; $i++) {
            $a = $this->fibonacciNumbers[$i - 2];
            $b = $this->fibonacciNumbers[$i - 1];
            $this->fibonacciNumbers[] = $a + $b;
        }
        $numberInRange = array_slice($this->fibonacciNumbers,$startPosition, $endPosition);
        return implode(", ", $numberInRange);
    }
}

$startPositionNum = intval(trim(fgets(STDIN)));
$endPositionNum = intval(trim(fgets(STDIN)));
$fibonacci = new Fibonacci($startPositionNum, $endPositionNum);
echo $fibonacci->getNumbersInRange($startPositionNum, $endPositionNum);