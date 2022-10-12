<?php
    require('./assets/views/header.php');
    if (isset($register)) {
        echo $register;
    }
    if(isset($login)){
        echo $login;
    }
    if(isset($search)){
        echo $search;
    }
    if(isset($myAccount)){
        echo $myAccount;
    }
    if(isset($newItinerary)){
        echo $newItinerary;
    }
    if(isset($searchResult)){
        echo $searchResult;
    }
    if(isset($editAccount)){
        echo $editAccount;
    }
    if(isset($myItinerary)){
        echo $myItinerary;
    }
    if(isset($modifyItinerary)){
        echo $modifyItinerary;
    }
    require('./assets/views/footer.php');