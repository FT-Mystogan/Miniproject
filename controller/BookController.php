<?php

use function Couchbase\defaultDecoder;
require_once './model/book/book.php';
require_once './model/book/bookDB.php';
require_once './model/category/category.php';
require_once './model/category/categoryDB.php';
require_once './inc/helper.php';
class BookController
{

    public $bookDB;
    public $categorys;
    public $helper;
    public function __construct()
    {
        $this->bookDB = new BookDB();
        $this->helper = new Helper();
    }
    public function add()
    {
        $categorys=$this->categorys;
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/book/add.php';
        } else {
            $name = $this->helper->replaceInput($_POST['name']);
            $author = $this->helper->replaceInput($_POST['author']);
            $categoryid = $_POST['category'];
            $description = $this->helper->replaceInput($_POST['description']);
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
            $name = $this->helper->replaceInput($_POST['name']);
            $author = $this->helper->replaceInput($_POST['author']);
            $categoryid = $_POST['category'];
            $description = $this->helper->replaceInput($_POST['description']);
            $price = $_POST['price'];
            $number = $_POST['number'];
            $book = new Book($name,$author, $categoryid,$description,$price,$number);
            $this->bookDB->update($id, $book);
            $this->getList();
        }
    }
}