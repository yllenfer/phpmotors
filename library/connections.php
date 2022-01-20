<?php

/*
*Proxy connector for phpmotors database
*/
function phpmotorsConnect(){
$server = 'mysql';
$dbname = 'phpmotors';
$username = 'iClient';
$password = 'removed-old-local-password';
$dsn = "mysql:host=$server;dbname=$dbname";
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);


try {
    $link = new PDO($dsn, $username, $password, $options);
     return $link;
   } catch(PDOException $e) {
     header('Location: /phpmotors/view/500.php');
     exit;
     //TODO: work on the 500 page
   }
}



?>