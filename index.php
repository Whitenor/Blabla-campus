<?php 
$dir = "./assets/controllers";
$list = array_diff(scandir($dir), array('..','.'));
foreach ($list as $controller) {
    require_once('./assets/controllers/'.$controller);
}
if(empty($_GET['page'])){
    homePage();
    if(isset($_SESSION['username_user'])){
        header('Location: ./searchItinerary');
    }
}else{
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'SE CONNECTER':
                loginUser();
                break;
            case 'CRÉER MON COMPTE':
                registerUser();
                break;
            case "RECHERCHER":
                $transfert = newArray(searchItineraryControl());
                require('./assets/views/viewsTraject/resultSearch.php');
                break;
            case "Se déconnecter":
                logoutUser();
                break;
            case "Proposer un trajet":
                registerTraject();
                break;
            case "Modifier mon compte":
                editUser();
                break;
            default:
                break;
        }
    }
    switch($_GET['page']){
        case "login" :
        case "register":
        case "myAccount":
        case "editAccount":
            accountPage();
            break;
        case "searchItinerary":
        case "newItinerary":
        case "resultSearch":
        case "myItinerary":
        case "modifyItinerary":
            trajectPage();
            break;
        case "confirmation":
            confirmationPage();
            break;
        default:
    }
}
// session_start();
// session_destroy();
