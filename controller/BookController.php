<?php

use function Couchbase\defaultDecoder;
require_once './model/book/book.php';
require_once './model/book/bookDB.php';
require_once './model/DBConnection.php';
require_once './model/category/category.php';
require_once './model/category/categoryDB.php';
class BookController
{

    public $bookDB;
    public $categorys;
    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=mysql", "root", "");
        $this->bookDB = new BookDB($connection->connect());
    }
    public function add()
    {
        $categorys=$this->categorys;
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/book/add.php';
        } else {
            $name = $_POST['name'];
            $author = $_POST['author'];
            $categoryid = $_POST['category'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $number = $_POST['number'];
            $book = new Book($name,$author,$categoryid,$description,$price,$number);
            $this->bookDB->create($book);
            $message = 'book is created';
            include 'view/book/add.php';
            unset($message);
        }
    }
    public function getList()
    {
        $books = $this->bookDB->getAll();
        include 'view/book/listbook.php';
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $this->bookDB->delete($id);
            include 'view/book/delete.php';
        }
    }

    public function edit()
    {
        $categorys=$this->categorys;
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $book = $this->bookDB->get($id);
            include 'view/book/edit.php';
        } else {
            $id = $_POST['id'];
            $book = new Book($_POST['name'], $_POST['author'], $_POST['category'],$_POST['description'],$_POST['price'], $_POST['number']);
            $this->bookDB->update($id, $book);
            $this->getList();
        }
    }
}