<?php

class Book
{
    private $title;
    private $author;
    private $price;

    function __construct(string $title, string $author, float $price)
    {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setPrice($price);
    }

    // Getters
    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getPrice()
    {
        return $this->price;
    }

    // Setters
    protected function setTitle(string $title)
    {
        if (strlen($title) < 3) {
            throw new Exception("Title not valid!");
        }
        $this->title = $title;
    }

    protected function setAuthor(string $author)
    {
        $nameAuthor = explode(" ", $author);
        if (is_numeric($nameAuthor[1][0])) {
            throw new Exception("Author not valid!");
        }
        $this->author = $author;
    }

    protected function setPrice(float $price)
    {
        if ($price <= 0) {
            throw new Exception("Price not valid!");
        }
        $this->price = $price;
    }

    public function __toString()
    {
        return "OK" . PHP_EOL . $this->getPrice();
    }
}

class GoldenEditionBook extends Book
{
    public function __construct($title, $author, $price)
    {
        parent::__construct($title, $author, $price);
    }

    public function getPrice()
    {
        return parent::getPrice() * 1.3;
    }
}

$names = explode(" ", trim(fgets(STDIN)));
$strNames = implode(" ", $names);
$title = trim(fgets(STDIN));
$price = floatval(trim(fgets(STDIN)));
$type = trim(fgets(STDIN));

try {
    if ($type === "STANDARD") {
        $book = new Book($title, $strNames, $price);
    } else if ($type === 'GOLD') {
        $book = new GoldenEditionBook($title, $strNames, $price);
    } else {
        throw new Exception("Type is not valid!");
    }
    echo $book;
} catch (Exception $e) {
    echo $e->getMessage();
}