<?php

require_once __DIR__.'/connect.php';

$sUserId = $_GET['user-id'] ?? '';

try{
    $stmt = $db->prepare('DELETE FROM users WHERE id = :iUserId');
    $stmt->bindValue(':iUserId', $sUserId);
    $stmt->execute();

    if( $stmt->rowCount() == 0 ){
        echo 'sorry, no user with that id';
        exit;
    }

    echo 'User deleted';

}catch(PDOException $ex){
    echo $ex;
}