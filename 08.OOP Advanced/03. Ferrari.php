<?php

interface ICar
{
    public function useBrakes():string;

    public function useGasPedal():string;
}

class Ferrari implements ICar
{
    private $model;
    private $driverName;

    public function __construct(string $driverName, string $model = "488-Spider")
    {
        $this->driverName = $driverName;
        $this->model = $model;
    }

    public function useBrakes(): string
    {
        return "Brakes!";
    }

    public function useGasPedal(): string
    {
        return "Zadu6avam sA!";
    }

    public function __toString()
    {
       return $this->model . "/" . $this->useBrakes() . "/" . $this->useGasPedal() . "/" . $this->driverName;
    }
}

$driverName = trim(fgets(STDIN));
$car = new Ferrari($driverName);
echo $car;
