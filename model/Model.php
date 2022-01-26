<?php
class Model
{
    public $connection;

    public function __construct()
    {
        $this->connection =new PDO("mysql:host=localhost;dbname=mysql", "root", "");
    }
}
