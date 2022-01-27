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
    public function isEmail($str)
    {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
    }
    public function validate()
    {
        $message = "";
        if (!isset($_POST['username'])) {
            $message = "Bạn chưa nhập vào email";
        } else if ($this->isEmail($_POST['username'])) {
            $message = "Trường này phải là email";
        }
        if (!isset($_POST['password'])) {
            $message = "Bạn chưa nhập vào password";
        }
        return $message;
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
    public function add($username, $password)
    {
        $this->userDB->creat($username, $password);
    }
    public function login()
    {
        include "view/user/login.php";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $message = $this->validate();
            if ($message == "") {
                $username = $_POST['username'];
                $password = $_POST['password'];
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
            else{
                include "view/user/login.php";
                unset($message);
            }
            
        }
    }
}
