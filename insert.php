<?php 

require_once __DIR__.'/connect.php';

$sName = "Ioana";
$sEmail = "iovb@kea.dk";
$sPassword = "password";
$iAge = 22;
$iSalary = '10';

// TODO: Validate before inserting

try{
  $stmt = $db->prepare('INSERT INTO users VALUES(null, :sName, :sEmail, :sPassword, :iAge, :iSalary)');
  $stmt->bindValue(':sName',      $sName);
  $stmt->bindValue(':sEmail',     $sEmail);
  $stmt->bindValue(':sPassword',  $sPassword);
  $stmt->bindValue(':iAge',       $iAge);
  $stmt->bindValue(':iSalary',    $iSalary);

  $stmt->execute();
  // now the database knows about the last inserted user id
  $iUserId = $db->lastInsertId();

  echo "USER INSERTED WITH ID $iUserId";

}catch(PDOException $ex){

}