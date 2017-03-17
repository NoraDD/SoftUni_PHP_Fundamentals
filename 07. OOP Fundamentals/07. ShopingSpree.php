<?php

class Person2
{
    private $name;
    private $money;
    private $bagOfProducts = [];

    public function __construct(string $name, float $money)
    {
        $this->setName($name);
        $this->setMoney($money);
    }

    //Getters
    public function getName()
    {
        return $this->name;
    }

    public function getMoney()
    {
        return $this->money;
    }

    //Setters
    public function setName($name)
    {
        if (strlen($name) == 0) {
            throw new Exception("Name cannot be empty");
        }
        $this->name = $name;
    }

    public function setMoney($money)
    {
        if ($money < 0) {
            throw new Exception("Money cannot be negative");
        }
        $this->money = $money;
    }

    public function addProduct(Product $product)
    {
        $this->bagOfProducts[] = $product;
    }

    public function decreaseMoney(float $money)
    {
        $this->setMoney($this->getMoney() - $money);
    }

    public function __toString()
    {
        $output = "{$this->name} - ";
        if (count($this->bagOfProducts) === 0) {
            return $output . "Nothing bought";
        }
        return $output . implode(",", array_map(function (Product $product) {
            return $product->getProductName();
        },
            $this->bagOfProducts));
    }
}

class Product
{
    private $productName;
    private $cost;

    public function __construct(string $productName, float $cost)
    {
        $this->setProductName($productName);
        $this->setCost($cost);
    }

    //Getters
    public function getProductName(): string
    {
        return $this->productName;
    }

    public function getCost(): float
    {
        return $this->cost;
    }

    //Setters
    public function setProductName(string $productName)
    {
        if (strlen($productName) == 0) {
            throw new Exception("Name cannot be empty");
        }
        $this->productName = $productName;
    }

    public function setCost(float $cost)
    {
        if ($cost < 0) {
            throw new Exception("Money cannot be negative");
        }
        $this->cost = $cost;
    }
}

$inputPeople = explode(";", trim(fgets(STDIN)));
$peopleArr = [];

$inputProducts = explode(";", trim(fgets(STDIN)));
$productsArr = [];

try {
    foreach ($inputPeople as $info) {
        $infoForPerson = explode('=', $info);
        if (count($infoForPerson) == 2) {
            $person = new Person2($infoForPerson[0], floatval($infoForPerson[1]));
            $peopleArr[$infoForPerson[0]] = $person;
            continue;
        }
        if (is_numeric($infoForPerson[0])) {
            throw new Exception("Name cannot be empty");
        }
    }
    unset($inputPeople);

    if ($inputProducts[0] != "END") {
        foreach ($inputProducts as $info) {
            $infoForProduct = explode('=', $info);
            if (count($infoForProduct) == 2) {
                $product = new Product($infoForProduct[0], floatval($infoForProduct[1]));
                $productsArr[$infoForProduct[0]] = $product;
                continue;
            }
            if (is_numeric($infoForProduct[0])) {
                throw new Exception("Name cannot be empty");
            }
        }
        unset($inputProducts);

        $personProduct = trim(fgets(STDIN));
        while (strtolower($personProduct) != "end") {
            $personProduct = explode(' ', $personProduct);
            if (count($personProduct) == 2) {
                if ($peopleArr[$personProduct[0]]->getMoney() >= $productsArr[$personProduct[1]]->getCost()) {
                    $peopleArr[$personProduct[0]]->addProduct($productsArr[$personProduct[1]]);
                    $peopleArr[$personProduct[0]]->decreaseMoney($productsArr[$personProduct[1]]->getCost());
                    echo "{$peopleArr[$personProduct[0]]->getName()} bought {$productsArr[$personProduct[1]]->getProductName()}" . PHP_EOL;
                } else {
                    echo "{$peopleArr[$personProduct[0]]->getName()} can't afford {$productsArr[$personProduct[1]]->getProductName()}" . PHP_EOL;
                }
            }
            $personProduct = trim(fgets(STDIN));
        }
    }

} catch (Exception $e) {
    echo $e->getMessage();
    return;
}
foreach ($peopleArr as $person) {
    echo $person . PHP_EOL;
}
