<?php

  require_once __DIR__.'/connect.php';

  $sUsername = $_GET['username'] ?? '';

  try{
    // SELECT * FROM users WHERE name='Santiago'
    $stmt = $db->prepare("SELECT DISTINCT name FROM users WHERE name LIKE :sName");
    $stmt->bindValue(':sName', "%$sUsername%"); // sanitizing, no special commands in the name
    $stmt->execute();
    $aRows = $stmt->fetchAll();

    if( count($aRows) == 0 ){
      echo '[]';
      exit;
    }

    $aSearchedUsers = [];
    foreach($aRows as $aRow){
      array_push($aSearchedUsers, $aRow->name);
    }
    echo json_encode($aSearchedUsers);
  
  }catch(PDOException $ex){
    echo $ex;
  }
