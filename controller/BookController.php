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
    public function validate()
    {
        $message = "";
        if (!isset($_POST['name'])) {
            $message = "Bạn chưa nhập vào tên sách";
        }
        if (!isset($_POST['author'])) {
            $message = "Bạn chưa nhập vào tên tác giả";
        }
        if (!isset($_POST['category'])) {
            $message = "Bạn chưa nhập vào tên thể loại";
        }
        if (!isset($_POST['description'])) {
            $message = "Bạn chưa nhập vào mô tả";
        }
        if (!isset($_POST['price'])) {
            $message = "Bạn chưa nhập vào giá tiền";
        } else if (is_numeric($_POST['price'])) {
            $message = "Giá tiền phải là số";
        }
        if (!isset($_POST['number'])) {
            $message = "Bạn chưa nhập vào tên thể loại";
        } else if (is_numeric($_POST['number'])) {
            $message = "Số lượng phải là số";
        }
        return $message;
    }
    public function add()
    {
        $categorys = $this->categorys;
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/book/add.php';
        } else {
            $message = $this->validate();
            if ($message == "") {
                $name = $this->helper->replaceInput($_POST['name']);
                $author = $this->helper->replaceInput($_POST['author']);
                $categoryid = $_POST['category'];
                $description = $this->helper->replaceInput($_POST['description']);
                $price = $_POST['price'];
                $number = $_POST['number'];
                $book = new Book($name, $author, $categoryid, $description, $price, $number);
                $this->bookDB->create($book);
                $message = 'book is created';
            }
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
        $categorys = $this->categorys;
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $book = $this->bookDB->get($id);
            include 'view/book/edit.php';
        } else {
            $message = $this->validate();
            if ($message == "") {
                $id = $_POST['id'];
                $name = $this->helper->replaceInput($_POST['name']);
                $author = $this->helper->replaceInput($_POST['author']);
                $categoryid = $_POST['category'];
                $description = $this->helper->replaceInput($_POST['description']);
                $price = $_POST['price'];
                $number = $_POST['number'];
                $book = new Book($name, $author, $categoryid, $description, $price, $number);
                $this->bookDB->update($id, $book);
                $this->getList();
            }
            else
                include 'view/book/edit.php';
        }
    }
}
