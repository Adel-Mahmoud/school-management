<?php
  $server = "localhost";
  $dbName = school;
  $dbUser = "root";
  $dbPass = "";
  try{
  $conn= new PDO ("mysql:host=$server;dbname=$dbName",$dbUser,$dbPass);
  $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
  }catch(PDOException $e){
  echo "failed " . $e->getMessage();
  }
         $id = isset($_GET["id"]) && is_numeric ($_GET["id"]) ? intval($_GET["id"]) :0;
          $stmt = $conn->prepare('DELETE FROM visit WHERE id = :a_id');          
          $stmt->bindParam("a_id",$id);
          $stmt->execute();
          header("Location:index.php");
?>