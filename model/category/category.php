<?php
class Category
{
    public $categoryid;
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
}
