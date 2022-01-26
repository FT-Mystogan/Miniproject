<?php

use function Couchbase\defaultDecoder;
session_start();
require_once "./model/DBConnection.php";
require_once "./model/user/user.php";
require_once "./model/user/userDB.php";

class UserController
{
    public $userDB;
    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=mysql", "root", "");
        $this->userDB = new UserDB($connection->connect());
    }
    public function setSession($user)
    {
        $_SESSION['user'] = $user;
        $_SESSION['id'] = $user->id;
        $_SESSION['fullname'] = $user->fullname;
        $_SESSION['username'] = $user->username;
        $_SESSION['password'] = $user->password;
        $_SESSION['img'] = $user->img;
    }
    public function checkLogin()
    {
        if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
            $user = new User($_COOKIE['id'], $_COOKIE['fullname'], $_COOKIE['username'], $_COOKIE['password'], $_COOKIE['img']);
            $this->setSession($user);
            header("Location: index.php?page=index");
            die();
        } else {
            $this->login();
        }
    }
    public function logout()
    {
        session_destroy();
        setcookie('id', '', time()- 86400, '/');
        setcookie('fullname','', time()- 86400, '/');
        setcookie('username','', time()- 86400, '/');
        setcookie('password', '', time()- 86400, '/');
        setcookie('img', '', time()- 86400, '/');
        include "view/user/login.php";
    }
    public function index()
    {
        include 'view/user/main.php';
    }
    public function login()
    {
        include "view/user/login.php";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($this->userDB->check($username, $password) != null) {
                $user = $this->userDB->check($username, $password);
               
                $this->setSession($user);
                if (isset($_POST['saveLogin'])) {
                    setcookie('id', $user->id, time() + 86400, '/');
                    setcookie('fullname', $user->fullname, time() + 86400, '/');
                    setcookie('username', $user->username, time() + 86400, '/');
                    setcookie('password', $user->password, time() + 86400, '/');
                    setcookie('img', $user->img, time() + 86400, '/');
                }

                header("Location: index.php?page=index");
                die();
            }

        }
    }
}
