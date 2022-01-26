<?php
require "controller/BookController.php";
require "controller/UserController.php";
require "controller/CatController.php";
?>
        <?php
        $bookcontroller = new BookController();
        $userController = new UserController();
        $catcontroller = new CatController();
        $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;
        if(!isset($_SESSION['fullname'])){
            $userController->checkLogin();
        }
        else
        {
        switch ($page) {
            case 'addbook':
                require "inc/header.php";
                require "inc/sidebar.php";
                $bookcontroller->categorys = $catcontroller->getCategorys();
                $bookcontroller->add();
                require "inc/footer.php";
                break;
            case 'deletebook':
                require "inc/header.php";
                require "inc/sidebar.php";
                $bookcontroller->delete();
                require "inc/footer.php";
                break;
            case 'editbook':
                require "inc/header.php";
                require "inc/sidebar.php";
                $bookcontroller->categorys = $catcontroller->getCategorys();
                $bookcontroller->edit();
                require "inc/footer.php";
                break;
            case 'listbook':
                require "inc/header.php";
                require "inc/sidebar.php";
                $bookcontroller->getList();
                require "inc/footer.php";
                break;
            case 'addcat':
                require "inc/header.php";
                require "inc/sidebar.php";
                $catcontroller->add();
                require "inc/footer.php";
                break;
            case 'deletecat':
                require "inc/header.php";
                require "inc/sidebar.php";
                $catcontroller->delete();
                require "inc/footer.php";
                break;
            case 'editcat':
                require "inc/header.php";
                require "inc/sidebar.php";
                $catcontroller->edit();
                require "inc/footer.php";
                break;
            case 'listcat':
                require "inc/header.php";
                require "inc/sidebar.php";
                $catcontroller->getList();
                require "inc/footer.php";
                break;
            case 'index':
                require "inc/header.php";
                require "inc/sidebar.php";
                $userController->index();
                require "inc/footer.php";
                break;
            case 'logout':
                $userController->logout();
                break;
            default:
                $userController->checkLogin();
                break;
        }
    }
        ?>