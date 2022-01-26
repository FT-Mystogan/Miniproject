<?php

use function Couchbase\defaultDecoder;

session_start();
require_once "./model/user/user.php";
require_once "./model/user/userDB.php";
require_once './inc/helper.php';
class UserController
{
    public $userDB;
    public $helper;
    public function __construct()
    {
        $this->userDB = new UserDB();
        $this->helper = new Helper();
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
        setcookie('id', '', time() - 86400, '/');
        setcookie('fullname', '', time() - 86400, '/');
        setcookie('username', '', time() - 86400, '/');
        setcookie('password', '', time() - 86400, '/');
        setcookie('img', '', time() - 86400, '/');
        include "view/user/login.php";
    }
    public function index()
    {
        include 'view/user/main.php';
    }
    public function add($username,$password){
        $this->userDB->creat($username,$password);
    }
    public function login()
    {
        include "view/user/login.php";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password =$_POST['password'];
            $user = $this->userDB->check($username, $password);
            if ($user != null) {
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
