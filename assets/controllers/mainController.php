<?php
    spl_autoload_register(function ($class_name) {
        include './assets/models/' . $class_name . '.php';
    });
    function homePage(){
        require(__DIR__.'/../views/homePage.php');
    }
    function confirmationPage(){
        $title = 'Félicitations';
        require(__DIR__.'/../views/confirmation.php');
    }