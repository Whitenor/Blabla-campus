<?php
    spl_autoload_register(function ($class_name) {
        include './assets/models/' . $class_name . '.php';
    });
    function accountPage(){
        switch($_GET['page']){
            case 'login':
                require('./assets/views/viewsAccount/login.php');
                break;
            case 'register':
                require('./assets/views/viewsAccount/register.php');
                break;
            case 'myAccount':
                require('./assets/views/viewsAccount/myAccount.php');
                break;
            case 'editAccount':
                require('./assets/views/viewsAccount/editAccount.php');
                break;
            default:
                break;
        }
    }
    function registerUser(){
        $newUser = new User;
        $newUser->register();
    }
    function loginUser(){
        $loginUser = new User;
        $loginUser->login();
    }
    function logoutUser(){
        $logout = new User;
        $logout->logout();
    }
    function editUser(){
        $edit = new User();
        $edit->editAccount();
    }