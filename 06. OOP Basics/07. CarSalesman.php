<?php

class Car
{
    private $model;
    private $engine;
    private $weight;
    private $color;

    public function __construct(string $model, Engine $engine, $weight, $color)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->weight = $weight;
        $this->color = $color;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getEngine(): Engine
    {
        return $this->engine;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function getColor()
    {
        return $this->color;
    }
}


class Engine
{
    private $engineModel;
    private $enginePower;
    private $displacement;
    private $efficiency;

    public function __construct($model, $power, $displacement, $efficiency)
    {
        $this->engineModel = $model;
        $this->enginePower = $power;
        $this->displacement = $displacement;
        $this->efficiency = $efficiency;
    }

    public function getEngineModel()
    {
        return $this->engineModel;
    }

    public function getEnginePower()
    {
        return $this->enginePower;
    }

    public function getDisplacement()
    {
        return $this->displacement;
    }

    public function getEfficiency()
    {
        return $this->efficiency;
    }
}

$countLinesEngines = intval(trim(fgets(STDIN)));

$engines = [];

for ($i = 0; $i < $countLinesEngines; $i++) {

    $engineInfoInput = explode(" ", trim(fgets(STDIN)));
    $engineModel = $engineInfoInput[0];
    $enginePower = floatval($engineInfoInput[1]);
    $displacement = "n/a";
    $efficiency = "n/a";

    if (count($engineInfoInput) > 2) {
        if (is_numeric($engineInfoInput[2])) {
            $displacement = floatval($engineInfoInput[2]);
        } else {
            $efficiency = $engineInfoInput[2];
        }
    }

    if (count($engineInfoInput) > 3) {
        $efficiency = $engineInfoInput[3];
    }

    $engine = new Engine($engineModel, $enginePower, $displacement, $efficiency);

    $engines[] = $engine;
}

$countLinesNumCars = intval(trim(fgets(STDIN)));

$cars = [];

for ($i = 0; $i < $countLinesNumCars; $i++) {

    $carInfoInput = explode(" ", trim(fgets(STDIN)));
    $model = $carInfoInput[0];
    $carEngine = null;
    $weight = "n/a";
    $color = "n/a";

    foreach ($engines as $engine) {
        if ($engine->getEngineModel() == $carInfoInput[1]) {
            $carEngine = $engine;
        }
    }

    if (count($carInfoInput) > 2) {
        if (is_numeric($carInfoInput[2]) && ($carInfoInput[2]) != 0) {
            $weight = floatval($carInfoInput[2]);
        } else {
            $color = $carInfoInput[2];
        }
    }

    if (count($carInfoInput) > 3) {
        $color = $carInfoInput[3];
    }

    $car = new Car($model, $carEngine, $weight, $color);

    $cars[] = $car;
}

foreach ($cars as $car) {
    echo $car->getModel() . ":\n";
    echo "  " . $car->getEngine()->getEngineModel() . ":\n";
    echo "    Power: " . $car->getEngine()->getEnginePower() . "\n";
    echo "    Displacement: " . $car->getEngine()->getDisplacement() . "\n";
    echo "    Efficiency: " . $car->getEngine()->getEfficiency() . "\n";
    echo "  Weight: " . $car->getWeight() . "\n";
    echo "  Color: " . $car->getColor() . "\n";
}