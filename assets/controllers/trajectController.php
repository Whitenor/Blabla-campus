<?php 
    spl_autoload_register(function ($class_name) {
        include './assets/models/' . $class_name . '.php';
    });
    function trajectPage(){
        switch ($_GET['page']) {
            case 'searchItinerary':
                require('./assets/views/viewsTraject/search.php');
                break;
            case 'newItinerary':
                require('./assets/views/viewsTraject/newTraject.php');
                break;
            case 'resultSearch':
                // var_dump(searchItineraryControl());
                break;
            case'myItinerary':
                $listTraject = new Trajet();
                $transfert = newArray($listTraject->getMyTrajects());
                require('./assets/views/viewsTraject/myItinerary.php');
                break;
            case 'modifyItinerary':
                require('./assets/views/viewsTraject/modifyItinerary.php');
                break;
            default:
                break;
        }
    }
    function registerTraject(){
        $entry = new Trajet();
        $entry->newItinerary();
    }
    function searchItineraryControl(){
        $searchingItinerary = new Trajet();
        return $searchingItinerary->searchItinerary();
    }
    function day($target){
        $monthAndDay = $target;
        $monthAndDayArray = explode('-', $monthAndDay);
        return implode('',array_splice($monthAndDayArray,2, 2));
    }
    function month($target){
        $monthAndDay = $target;
        $monthAndDayArray = explode('-', $monthAndDay);
        $removeday = array_splice($monthAndDayArray,0,2);
        switch (implode('',array_splice($removeday,1,1))) {
            case '01':
                return "JANV";
                break;
            case '02':
                return "FEVR";
                break;
            case '03':
                return "MARS";
                break;
            case '04':
                return "AVR";
                break;
            case '05':
                return "MAI";
                break;
            case '06':
                return "JUIN";
                break;
            case '07':
                return "JUILL";
                break;
            case '08':
                return "AOUT";
                break;
            case '09':
                return "SEPT";
                break;
            case '10':
                return "OCT";
                break;
            case '11':
                return "NOV";
                break;
            default:
                return "DEC";
                break;
        }
    }
    function newArray($oldArray){
        $newArray = [];
        for ($i=0; $i < count($oldArray); $i++) {
            $newArray[$i]['id_traject'] = $oldArray[$i]['id_traject'];
            $newArray[$i]['starting_point'] = $oldArray[$i]['start_traject'];
            $newArray[$i]['end_point']= $oldArray[$i]['end_traject'];
            $newArray[$i]['timeTotravel']= $oldArray[$i]['timeToTravel'];
            $newArray[$i]['day'] = day($oldArray[$i]['date_traject']);
            $newArray[$i]['month']= month($oldArray[$i]['date_traject']);
            $newArray[$i]['hourStart']= $oldArray[$i]['hour_traject'];
            $newArray[$i]['step1']= $oldArray[$i]['point1_traject'];
            $newArray[$i]['step2']= $oldArray[$i]['point2_traject'];
            $newArray[$i]['step3']= $oldArray[$i]['point3_traject'];
            $newArray[$i]['numberplace_traject']=$oldArray[$i]['numberplace_traject'];
            $newArray[$i]['placeRest']=$oldArray[$i]['placerest_traject'];
            $newArray[$i]['type_traject']=$oldArray[$i]['type_traject'];
            $newArray[$i]['date_traject'] = $oldArray[$i]['date_traject'];
            if (isset($oldArray[$i]['img_user'])) {
                $newArray[$i]['id_user']=$oldArray[$i]['Id_user'];
                $newArray[$i]['img_user']=$oldArray[$i]['img_user'];
                $newArray[$i]['bio_user']=$oldArray[$i]['bio_user'];
                $newArray[$i]['username_user']=$oldArray[$i]['username_user'];
            }
        }
        return $newArray;
    }
    // créer nouveau tableau à partir des données récupéré , split la partie date en deux morceaux via day et month puis le retourner pour ensuite l'exploiter dans une boucle sur la vue resultSearch. que faire pour les étapes ? nouvelle ligne ? les ignorer ? les montrer en résultat?