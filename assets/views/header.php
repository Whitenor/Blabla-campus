<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Epilogue:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="shortcut icon" href="./assets/img/favicon.png?v=2" type="image/x-icon">
    <title><?php if($title){echo $title;}else{echo"BlaBla Campus";}?></title>
</head>

<body class="flex justify-between items-center w-screen h-screen lg:p-12 lg:pt-32 ">
    <h1 class="hidden">Blabla Campus</h1>
    <section id="section1" class="hidden w-1/2 h-full lg:flex flex-col justify-between items-start ">
        <div id="section1-row1" class="flex flex-col items-start justify-center gap-y-6">
            <img class="logo" src="./assets/img/logoBlaBlaFirstPage.png" alt="acceuil"/>
            <h3 class="italic font-merriweather">Trouver <span class="text-redOnline font-black">facilement</span> un covoiturage pour se rendre en <span class="text-redOnline font-black">formation</span></h3>
            <p class="font-overpass">Tu es nouveau dans la formation et tu cherches quelqu’un faisant lemême chemin que toi pour venir en formation.<br/>Pas de soucis <span class="text-redOnline font-bold">Blabla Campus</span> est là pour toi.<br/>Crée toi un compte ou connecte toi pour soit proposer un covoiturage, soit pour voir toutes les offes disponibles.<br/><span class="font-bold text-redOnline">Blabla Campus</span> est un service gratuit, il n’est enaucun cas question de mettre en place une monétisation des trajets.<br/>Bon voyage à toutes et à tous!<br/></p>
        </div>
        <div id="section1-row2">
            <small>
				<a href="./mention" class="text-redOnline">Mentions légales</a> <a href="./politique" class="text-redOnline">Politique de confidentialité</a>
			</small>
        </div>
    </section>
    <section id="section2" class="w-full lg:w-1/2 h-full flex flex-col justify-start items-center">
        <div id="interractZone" class="h-full w-full lg:h-5/6 lg:w-4/5 flex flex-col justify-start items-center rounded-20px bg-white shadow-lg px-4 overflow-auto">
            <header id="topMenu" class="sticky top-0 left-0 w-5/6 h-32 flex justify-between items-center bg-white z-20 p-4">
                <a href="../testMvc">
                    <img src="./assets/img/simplifiedLogo.png" alt="Logo simplifié de BlaBla Campus">
                </a>
                <a href="./myAccount" id="changingZone" class="text-redOnline workSans"></a>
            </header>   