<?php

class Car
{
    public $model;
    public $fuelAmount;
    public $fuelCost;
    public $distanceTravelled;

    public function __construct(string $model, float $fuelAmount, float $fuelCost)
    {
        $this->model = $model;
        $this->fuelAmount = $fuelAmount;
        $this->fuelCost = $fuelCost;
        $this->distanceTravelled = 0;
    }

    public function drive(float $km)
    {
        $cost = $km * $this->fuelCost;
        $cost = round($cost, 2);

        if ($cost > round($this->fuelAmount, 2)) {
            throw new Exception("Insufficient fuel for the drive");
        }
        $this->fuelAmount -= $cost;
        $this->distanceTravelled += $km;
    }

    public function __toString()
    {
        return $this->model . ' ' . number_format(abs($this->fuelAmount), 2) . ' ' . $this->distanceTravelled;
    }
}

$cars = [];

$n = intval(fgets(STDIN));

while ($n--) {
    $line = trim(fgets(STDIN));
    $tokens = explode(" ", $line);
    $model = $tokens[0];
    $startFuel = floatval($tokens[1]);
    $fuelCost = floatval($tokens[2]);

    $car = new Car($model, $startFuel, $fuelCost);
    $cars[$model] = $car;
}

$cmd = trim(fgets(STDIN));
while ($cmd != 'End') {
    $tokens = explode(" ", $cmd);

    if ($tokens[0] != "Drive") {
        $cmd = trim(fgets(STDIN));
        continue;
    }
    $model = $tokens[1];
    $km = floatval($tokens[2]);

    $car = $cars[$model];

    try {
        $car->drive($km);
    } catch (Exception $exception) {
        echo $exception->getMessage() . PHP_EOL;
    }

    $cmd = trim(fgets(STDIN));
}

foreach ($cars as $car) {
    echo $car . PHP_EOL;

}