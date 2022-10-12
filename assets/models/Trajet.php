<?php

include("User.php");
class Trajet extends User
{
  public function newItinerary(){
    $start = $_POST['createItineraryDepart'];
    $end = $_POST['itineraryFinalCreate'];
    $dateCreate = $_POST['dateDepart'];
    $hour = $_POST['departureTime'];
    $numPlace = $_POST['placesNumber'];
    $type = $_POST['typeTrajetTest'];
    $ttt = $_POST['timeToTravel'];
    $addReq = array();
    $addSelect = array();
    if (isset($_POST['step1Adding']) && !empty($_POST['step1Adding'])) {
      $step1 = $_POST['step1Adding'];
      array_push($addSelect, ', point1_traject');
      array_push($addReq, ', :point1_traject');
    }
    if (isset($_POST['step2Adding']) && !empty($_POST['step2Adding'])) {
      $step2 = $_POST['step2Adding'];
      array_push($addSelect, 'point2_traject');
      array_push($addReq, ':point2_traject');
    }
    if (isset($_POST['step3Adding']) && !empty($_POST['step3Adding'])) {
      $step3 = $_POST['step3Adding'];
      array_push($addSelect, 'point3_traject');
      array_push($addReq, ':point3_traject');
    }
    $addRequest = implode(", ", $addReq);
    $addSelections = implode(", ", $addSelect);
    $registertraj = $this->connect()->prepare('INSERT INTO trajects (start_traject, end_traject, date_traject, hour_traject, numberplace_traject, placerest_traject, type_traject' . $addSelections . ', timeToTravel,Id_user) VALUES (:start_traject, :end_traject, :date_traject, :hour_traject, :numberplace_traject, :placerest, :type_traject' . $addRequest . ', :ttt, :userid )');
    $registertraj->bindParam(':start_traject', $start);
    $registertraj->bindParam(':end_traject', $end);
    $registertraj->bindParam(':date_traject', $dateCreate);
    $registertraj->bindParam(':hour_traject', $hour);
    $registertraj->bindParam(':numberplace_traject', $numPlace);
    $registertraj->bindParam(':placerest', $numPlace);
    $registertraj->bindParam(':type_traject', $type);
    if (isset($_POST['step1Adding']) && !empty($_POST['step1Adding'])) {
      $registertraj->bindParam(':point1_traject', $step1);
    }
    if (isset($_POST['step2Adding']) && !empty($_POST['step2Adding'])) {
      $registertraj->bindParam(':point2_traject', $step2);
    }
    if (isset($_POST['step3Adding']) && !empty($_POST['step3Adding'])) {
      $registertraj->bindParam(':point3_traject', $step3);
    }
    $registertraj->bindParam(':ttt', $ttt);
    session_start();
    $registertraj->bindParam(':userid', $_SESSION['id_user']);
    $registertraj->execute();
    // $registertraj->debugDumpParams();
  }
  public function editItinerary(){
    $start = $_POST['createItineraryDepart'];
    $end = $_POST['itineraryFinalCreate'];
    $dateCreate = $_POST['dateDepart'];
    $hour = $_POST['departureTime'];
    $numPlace = $_POST['placesNumber'];
    $type = $_POST['typeTrajetTest'];
    $step1 = $_POST['step1Adding'];
    $step2 = $_POST['step2Adding'];
    $step3 = $_POST['step3Adding'];
    $addReq = array();
    if (!empty($_POST['step1Adding'])) {
      array_push($addReq, ':point1_traject');
    }
    if (!empty($_POST['step2Adding'])) {
      array_push($addReq, ':point2_traject');
    }
    if (!empty($_POST['step3Adding'])) {
      array_push($addReq, ':point3_traject');
    }
    $addRequest = implode(" ,", $addReq);
    $registertraj = $this->connect()->prepare("INSERT INTO traject (start_traject, end_traject, date_traject, hour_traject, numberplace_traject, type_traject, point1_traject, point2_traject, point3_traject) VALUES (:start_traject, :end_traject, :date_traject, :hour_traject, :numberplace_traject, :type_traject $addRequest )");
    $registertraj->bindParam(':start_traject', $start, PDO::PARAM_STR);
    $registertraj->bindParam(':end_traject', $end, PDO::PARAM_STR);
    $registertraj->bindParam(':date_traject', $dateCreate, PDO::PARAM_STR);
    $registertraj->bindParam(':hour_traject', $hour, PDO::PARAM_STR);
    $registertraj->bindParam(':numberplace_traject', $numPlace, PDO::PARAM_STR);
    $registertraj->bindParam(':type_traject', $type, PDO::PARAM_STR);
    $registertraj->bindParam(':point1_traject', $step1, PDO::PARAM_STR);
    $registertraj->bindParam(':point2_traject', $step2, PDO::PARAM_STR);
    $registertraj->bindParam(':point3_traject', $step3, PDO::PARAM_STR);
    // $registertraj->execute();
    $registertraj->debugDumpParams();
    // header('Location: ../pages/searchItinerary.php');
  }
  public function searchItinerary(){
    $req = array();
    $value = array();

    if (!empty($_POST['startingPointSearch'])) {
      array_push($req, 'AND (start_traject = ? OR point1_traject LIKE ? OR point2_traject LIKE ? OR point2_traject LIKE ?)');
      for ($i=0; $i < 4; $i++) { 
        array_push($value, $_POST['startingPointSearch']);
      }
      
    }

    if (!empty($_POST['arrivalPointSearch'])) {
      array_push($req, 'AND end_traject = ?');
      array_push($value, $_POST['arrivalPointSearch']);
    }

    if (!empty($_POST['dateSearch'])) {
      array_push($req, 'AND date_traject = ?');
      array_push($value, $_POST['dateSearch']);
    }

    $request = implode(" ", $req);
    $search = $this->connect()->prepare('SELECT DISTINCT * FROM trajects INNER JOIN users ON trajects.Id_user = users.Id_user WHERE 1 AND placerest_traject > 0 ' . $request . '');
    $search->execute($value);
    // return $search->debugDumpParams();
    return $search->fetchAll();
  }
  public function getMyTrajects(){
    session_start();
    $myItinerary = $this->connect()->prepare('SELECT * FROM trajects WHERE id_user = :id_user ORDER BY date_traject DESC, hour_traject DESC');
    $myItinerary->bindParam(':id_user', $_SESSION['id_user']);
    $myItinerary->execute();
    return $myItinerary->fetchAll();
  }
  // public function deleteTraject()
  // {
  //   $delete = $this->connect()->prepare("DELETE FROM traject WHERE id_traject = :id_traject");
  //   $delete->bindValue(':id_trajet', $idTraject);
  //   $delete->execute();
  //   header('Location: ./confirmation.php');
  // }
}
