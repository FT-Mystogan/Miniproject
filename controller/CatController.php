<?php
require_once "./model/category/category.php";
require_once "./model/category/categoryDB.php";
require_once './inc/helper.php';
class CatController
{
    public $categoryDB;
    public $helper;
    public function __construct()
    {
        $this->categoryDB = new CategoryDB();
        $this->helper = new Helper();
    }
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/category/add.php';
        } else {
            $name = $this->helper->replaceInput($_POST['name']);
            $category = new Category($name);
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
            $category = new category($this->helper->replaceInput($_POST['name']));
            $this->categoryDB->update($id, $category);
            $this->getList();
        }
    }
}
