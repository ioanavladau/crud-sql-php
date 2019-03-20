<?php

require_once __DIR__.'/connect.php';

$sNewName = 'Again';
$sOldName = 'YOU';


try{

    $stmt = $db->prepare('UPDATE users SET name = :sNewName WHERE name = :sOldName');
    $stmt->bindValue(':sNewName', $sNewName);
    $stmt->bindValue(':sOldName', $sOldName);
    $stmt->execute();

    if( $stmt->rowCount() == 0 ){
        echo 'Sorry, no names updated';
        exit;
    }

    echo "Done, all names changed, I found: ".$stmt->rowCount();

}catch(PDOException $ex){
    echo $ex;
    // in reality you show code and status
}