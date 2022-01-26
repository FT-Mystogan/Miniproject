<?php
class Book
{
    public $bookid;
    public $name;
    public $author;
    public $categoryid;
    public $description;
    public $price;
    public $number;

    public function __construct($name,$author,$categoryid,$description,$price,$number)
    {
       $this->name = $name;
       $this->author =$author;
       $this->categoryid = $categoryid;
       $this->description = $description;
       $this->price = $price;
       $this->number = $number;
    }
}