<?php session_start(); ?>
<!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Epilogue:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,300&family=Work+Sans:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="shortcut icon" href="assets/img/favicon.png?v=2" type="image/x-icon">
        <title>BlaBla Campus</title>
    </head>

    <body class="flex flex-col justify-center items-center w-screen min-h-screen gap-20">
        <h1 class="hidden bottom-0 right-0 translate-y-full z-10">Blabla Campus</h1>
        <img src="assets/img/logoBlaBlaFirstPage.png" alt="Logo de BlaBla Campus">
        <div id="containerStarting" class="w-4/5">
            <a href="register" id="starting" class="flex w-full justify-center items-center gap-2 bg-redOnline">
                <img src="assets/img/carStarting.png" alt="Une voiture">
                <p class="text-white font-workSans tracking-5px">COMMENCEZ</p>
            </a>
            <a href="login" class="flex justify-center items-center w-full">
                <p class="font-workSans tracking-5px text-redOnline">SE CONNECTER</p>
            </a>
        </div>
        <script src="assets/js/var.js"></script>
        <script src="assets/js/functions.js"></script>
        <script src="assets/js/class.js"></script>
        <script src="assets/js/app.js"></script>
    </body>

    </html>