<?php

// This is the main controller 

$action = filter_input(INPUT_POST, 'action2');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

 switch ($action){
    case 'something':
     
     break;
    
    default:
     include 'view/home.php';
   }

 ?>