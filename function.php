<?php
  $host = 'localhost';
  $dbname = 'school';
  $username = 'root';
  $password = '';
  try {
      $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
      //echo "Connected to $dbname at $host successfully.";
  } catch (PDOException $pe) {
      die("Could not connect to the database $dbname :" . $pe->getMessage());
  }
  function the_count($count){
           global $conn;
           $stmet = $conn->prepare("SELECT COUNT($count) FROM students ");	
           $stmet->execute();
           return $stmet->fetchColumn();
  }
  function the_cou($count){
  global $conn;
  $stmet = $conn->prepare("SELECT COUNT($count) FROM students WHERE adrs='cairo'");	
  $stmet->execute();
  return $stmet->fetchColumn();
  }
  function my_update($ap){
	  global $conn;
	  global $id;
	  $id = isset($_GET["id"]) && is_numeric ($_GET["id"]) ? intval($_GET["id"]) :0;
	  $stmt = $conn->prepare("UPDATE students SET approv = $ap WHERE id = ?");     
	  $stmt->execute(array($id));
  }
  function my_delete(){
      global $conn;
      global $id;
      $id = isset($_GET["id"]) && is_numeric ($_GET["id"]) ? intval($_GET["id"]) :0;
      $stmt = $conn->prepare('DELETE FROM students WHERE id = :a_id ');
      $stmt->bindParam("a_id",$id);
      $stmt->execute();
  }
?>