<?php

  require_once __DIR__.'/connect.php';

  $sUsername = $_GET['txtSearch'] ?? '';

  try{
    // SELECT * FROM users WHERE name='Santiago'
    $stmt = $db->prepare("SELECT DISTINCT name FROM users WHERE name LIKE :sName");
    $stmt->bindValue(':sName', "%$sUsername%"); // sanitizing, no special commands in the name
    $stmt->execute();
    $aRows = $stmt->fetchAll();
    if( count($aRows) == 0 ){
      echo 'Sorry, no friends';
      exit;
    }
    foreach($aRows as $aRow){
      // echo '<div>'.$aRow['name'].'</div>'; // FETCH_ASSOC
      echo $aRow->name; // FETCH_OBJ
    }
  
  }catch(PDOException $ex){
    echo $ex;
  }
