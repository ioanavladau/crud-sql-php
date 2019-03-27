<?php

  require_once __DIR__.'/connect.php';

  $sUsername = $_GET['username'] ?? '';

  try{
    // SELECT * FROM users WHERE name='Santiago'
    $stmt = $db->prepare("SELECT DISTINCT name FROM users WHERE name LIKE :sName");
    $stmt->bindValue(':sName', "%$sUsername%"); // sanitizing, no special commands in the name
    $stmt->execute();
    $aRows = $stmt->fetchAll();

    $jResponse = new stdClass();

    if( count($aRows) == 0 ){
      echo '[]';
      exit;
    }

    $aSearchedUsers = [];
    // $jUsers = new stdClass();
    foreach($aRows as $iIndex=>$aRow){
      // echo '<div>'.$aRow['name'].'</div>'; // FETCH_ASSOC
      // array_push($aSearchedUsers, $aRow->name);
      // $jSearchedUsers = json_encode($aSearchedUsers);
      // echo json_encode($aSearchedUsers);
      array_push($aSearchedUsers, $aRow->name);
    }
    echo json_encode($aSearchedUsers);
  
  }catch(PDOException $ex){
    echo $ex;
  }
