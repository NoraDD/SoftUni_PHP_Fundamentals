<?php

class Box2
{
    private $length;
    private $width;
    private $height;

    public function __construct(float $length, float $width, float $height)
    {
        $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height);
    }

    //Setters
    private function setLength(float $length)
    {
        if ($length <= 0) {
            throw new Exception("Length cannot be zero or negative.");
        }
        $this->length = $length;
    }

    private function setWidth(float $width)
    {
        if ($width <= 0) {
            throw new Exception("Width cannot be zero or negative.");
        }
        $this->width = $width;
    }

    private function setHeight(float $height)
    {
        if ($height <= 0) {
            throw new Exception("Height cannot be zero or negative.");
        }
        $this->height = $height;
    }

    //Getters
    public function getSurfaceArea(): float
    {
        return 2 * $this->length * $this->width + 2 * $this->length * $this->height + 2 * $this->width * $this->height;
    }

    public function getLateralSurfaceArea(): float
    {
        return 2 * $this->length * $this->height + 2 * $this->width * $this->height;
    }

    public function getVolume(): float
    {
        return $this->length * $this->width * $this->height;
    }

    public function __toString()
    {
        return "Surface Area - " . number_format($this->getSurfaceArea(), 2, '.', '') . PHP_EOL .
        "Lateral Surface Area - " . number_format($this->getLateralSurfaceArea(), 2, '.', '') . PHP_EOL .
        "Volume - " . number_format($this->getVolume(), 2, '.', '');
    }
}

$length = floatval(trim(fgets(STDIN)));
$width = floatval(trim(fgets(STDIN)));
$height = floatval(trim(fgets(STDIN)));

try {
    $box = new Box2($length, $width, $height);
    echo $box;
} catch (Exception $exception) {
    echo $exception->getMessage();
}
