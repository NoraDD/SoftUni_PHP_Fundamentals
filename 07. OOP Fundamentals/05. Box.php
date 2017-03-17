<?php

class Box
{
    private $length;
    private $width;
    private $height;

    public function __construct(float $length, float $width, float $height)
    {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

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

$box = new Box($length, $width, $height);

echo $box;
