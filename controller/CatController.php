<?php
require_once "./model/category/category.php";
require_once "./model/category/categoryDB.php";
require_once './model/DBConnection.php';

class CatController
{
    public $categoryDB;
    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=mysql", "root", "");
        $this->categoryDB = new CategoryDB($connection->connect());
    }
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/category/add.php';
        } else {
            $name = $_POST['name'];
            $category = new Category($name);
            var_dump($category);
            $this->categoryDB->create($category);
            $message = 'category created';
            include 'view/category/add.php';
        }
    }
    public function getCategorys(){
        return $this->categoryDB->getAll();
    }
    public function getList()
    {
        $categorys = $this->categoryDB->getAll();
        include 'view/category/listcat.php';
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $this->categoryDB->delete($id);
            include 'view/category/delete.php';
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $category = $this->categoryDB->get($id);
            include 'view/category/edit.php';
        } else {
            $id = $_POST['id'];
            $category = new category($_POST['name']);
            $this->categoryDB->update($id, $category);
            $this->getList();
        }
    }
}
