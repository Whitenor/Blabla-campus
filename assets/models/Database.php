<?php
//fonction de connextion à la base
abstract class Database
{
  public function connect()
  {
    try {
      $db = new PDO('mysql:host=localhost;dbname=blabla_campus', 'root', '');
      return $db;
    } catch (PDOException $e) {
      print "Erreur !: " . $e->getMessage() . "<br/>";
      die();
    }
  }
}
