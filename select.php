<?php

require_once __DIR__.'/connect.php';

$sName = $_GET['name'] ?? 'Santiago';

try{
  // SELECT * FROM users WHERE name='Santiago'
  $stmt = $db->prepare("SELECT * FROM users WHERE name LIKE :sName");
  $stmt->bindValue(':sName', "%$sName%"); // sanitizing, no special commands in the name
  $stmt->execute();
  $aRows = $stmt->fetchAll();
  if( count($aRows) == 0 ){
    echo 'Sorry, no friends';
    exit;
  }
  foreach($aRows as $aRow){
    // echo '<div>'.$aRow['name'].'</div>'; // FETCH_ASSOC
    echo "<div>$aRow->name is $aRow->age</div>"; // FETCH_OBJ
  }

}catch(PDOException $ex){
echo $ex;
}